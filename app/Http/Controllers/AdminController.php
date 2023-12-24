<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\User;
use App\Models\LabTest;
use App\Models\Payment;
use App\Models\FollowUp;
use App\Models\Examination;
use App\Models\UserPayment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Http\Helpers\AuthHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // roles:'user', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'
    private $auth;
    public function __construct(AuthHelper $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $user_count = User::where('role', '=', 'user')
            ->when(!$this->auth->denyRoles('user'), function ($query) {
                $query->where('created_by', auth()->id());
            })->count();

        $staff_count = User::where('role', '!=', 'user')
            ->when(!$this->auth->denyRoles('user'), function ($query) {
                $query->where('created_by', auth()->id());
            })->count();

        $users = User::join('users as staff', 'users.created_by', '=', 'staff.id')
            ->where('users.role', 'user')
            ->when(!$this->auth->allowRoles('admin', 'front-desk', 'accountant', 'nurse', 'doctor', 'lab-scientist', 'pharmacy'), function ($query) {
                $query->where('users.created_by', auth()->id());
            })
            ->select([
                'users.id', 'users.created_at', 'users.name', 'users.email', 'users.phone', 'users.gender', 'users.dob', 'users.state', 'users.user_id',
                'staff.name as staff_name'
            ])
            ->orderBy('users.created_at', 'desc')
            ->paginate(5);

        $examination_count = Examination::when(!$this->auth->allowRoles('admin'), function ($query) {
            $query->where('created_by', auth()->id());
        })->count();

        $examinations = Examination::join('users', 'examinations.user_id', '=', 'users.id')
            ->join('users as medical', 'examinations.created_by', '=', 'medical.id')
            ->when(!$this->auth->allowRoles('admin', 'front-desk', 'accountant', 'nurse', 'doctor', 'lab-scientist', 'pharmacy'), function ($query) {
                $query->where('users.created_by', auth()->id());
            })
            ->select([
                'users.name', 'users.email', 'users.phone', 'users.gender', 'users.dob', 'users.state', 'users.user_id',
                'examinations.weight', 'examinations.height', 'examinations.bmi', 'examinations.blood_pressure', 'examinations.pulse_rate', 'examinations.blood_sugar', 'examinations.temperature', 'examinations.created_at',
                'examinations.id', 'medical.name as medical_name', 'examinations.user_id'
            ])
            ->orderBy('examinations.created_at', 'desc')
            ->paginate(5);

        $consultations = Consultation::join('examinations', 'consultations.examination_id', '=', 'examinations.id')
            ->join('users', 'examinations.user_id', '=', 'users.id')
            ->join('users as medical', 'consultations.created_by', '=', 'medical.id') // Corrected join condition
            ->when(!$this->auth->allowRoles('admin', 'front-desk', 'accountant', 'nurse', 'doctor', 'lab-scientist', 'pharmacy'), function ($query) {
                $query->where('users.created_by', auth()->id());
            })
            ->select([
                'users.name', 'users.email', 'users.phone', 'users.gender', 'users.dob', 'users.state', 'users.user_id',
                'examinations.weight', 'examinations.height', 'examinations.bmi', 'examinations.blood_pressure', 'examinations.pulse_rate', 'examinations.blood_sugar', 'examinations.temperature', 'examinations.created_at',
                'consultations.diagnosis', 'consultations.provisional_diagnosis', 'consultations.comments', 'consultations.created_at as consultation_created_at',
                'consultations.id', 'medical.name as medical_name', 'examinations.user_id'
            ])
            ->orderBy('consultations.created_at', 'desc')
            ->paginate(5);


        $labTestCount = LabTest::count();
        $drugCount = Drug::count();
        $consultationCount = Consultation::count();

        return view('admin.indexadmin', compact(
            'user_count',
            'staff_count',
            'users',
            'examination_count',
            'examinations',
            'consultations',
            'labTestCount',
            'drugCount',
            'consultationCount',
        ));
    }

    public function addstaff()
    {
        return view('admin.addstaff');
    }

    public function adduser()
    {
        return view('admin.adduser');
    }

    public function submituser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'state' => 'required|string',
            'dob' => 'required',
            'gender' => 'required|in:Male,Female',
        ]);

        $request->merge([
            'role' => 'user',
            'created_by' => auth()->id(),
            'password' => Hash::make('123456'),
            'user_id' => rand(100000000, 999999999)
        ]);

        User::create($request->all());

        return back()->with('success', 'success');
    }

    public function submitstaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'role' => 'required',
        ]);

        $request->merge([
            'created_by' => auth()->id(),
            'password' => Hash::make('123456'),
            'user_id' => rand(100000000, 999999999)
        ]);

        User::create($request->all());

        return back()->with('success', 'success');
    }


    public function viewstaffdata()
    {
        $users = User::whereNotIn('role', ['user'])
            ->with('createdBy')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.viewstaffdata', compact('users'));
    }


    public function viewuserdata($id = null)
    {
        if ($id === null) {
            $query = User::query()
                ->with('createdBy')
                ->when(!$this->auth->allowRoles('admin', 'front-desk', 'accountant', 'nurse', 'doctor', 'lab-scientist', 'pharmacy'), function ($query) {
                    $query->where('created_by', auth()->id());
                })
                ->where('role', 'user');

            $users = $query->paginate(5);

            return view('admin.viewuserdata', compact('users'));
        }
    }



    public function deletedata($type, $id)
    {

        switch ($type) {
            case 'examination':
                Examination::destroy($id);
                return back()->with('success', 'success.');
                break;

            default:
                return back()->with('failed', 'failed.');
                break;
        }
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:25',
            'type' => 'in:name,phone,email,user_id',
        ]);

        $search = $request->input('search');
        $type = $request->input('type');

        $users = User::where($type, 'like', "%$search%")
            ->when(!$this->auth->allowRoles('staff'), function ($query) {
                $query->where('users.created_by', auth()->id());
            })
            ->select([
                'users.id', 'users.created_at', 'users.name', 'users.email', 'users.phone', 'users.gender', 'users.dob', 'users.state', 'users.user_id'
            ])
            ->get();

        $userIds = $users->pluck('id');

        $payments = Payment::whereIn('user_id', $userIds)
            ->select(['id', 'payment_desc', 'amount', 'status'])
            ->get();

        return view('admin.viewuserdata', compact('users', 'payments'));
    }






    public function getUser($id)
    {
        $user = User::with('examinations')->find($id);

        return view('admin.user-profile', compact('user'));
    }



    public function updatePaymentStatus(Request $request, $id)
    {
        $payment = UserPayment::findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:pending,paid',
        ]);
        $payment->update($validatedData);
        return redirect()->route('admin.allpayments')->with('success', 'success');
    }


    public function updateForm($id)
    {
        $payment = UserPayment::find($id);
        return view('admin.updatepaymentstatus', compact('payment'));
    }


    public function allPayments()
    {
        $payments = UserPayment::paginate(5);

        return view('admin.allpayments', compact('payments'));
    }
}
