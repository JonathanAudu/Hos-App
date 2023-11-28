<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use Illuminate\Support\Facades\DB;

class ConsultationsController extends Controller
{
    // roles:'user', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'
    private $auth;
    public function __construct(AuthHelper $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        // Fetch the latest consultations for each user
        $consultations = Consultation::select('user_id', DB::raw('MAX(created_at) as latest_date'))
            ->groupBy('user_id');

        $latestConsultations = Consultation::whereIn('id', function ($query) use ($consultations) {
            $query->select(DB::raw('MAX(id)'))
                ->from('consultations')
                ->groupBy('user_id')
                ->get();
        })->with(['user:id,name,email,phone,dob,gender'])->get();


        return view('admin.viewconsultation', compact('latestConsultations'));
    }


    public function getConsultation($user_id)
    {
        $consultations = DB::table('consultations')
            ->select('consultations.*', 'users.name as user_name') // Select the name from users
            ->join('users', 'consultations.user_id', '=', 'users.id')
            ->where('consultations.user_id', $user_id) // Use 'consultations.user_id' to filter by user ID
            ->get();

        //        dd($consultations[0]->id);
        return view('admin.consultation', compact('consultations'));
    }




    public function indexForm($id)
    {
        $user = User::find($id);

        return view('admin.addconsultation', compact('user'));
    }


    public function editForm($id)
    {
        $consultation = Consultation::find($id);
        // Fetch all doctors
        $doctors = User::where('role', 'doctor')->get();

        return view('admin.updateconsultation', compact('consultation', 'doctors'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'bmi' => 'required|numeric',
            'blood_pressure' => 'required|string',
            'pulse_rate' => 'required|numeric',
            'blood_sugar' => 'required|numeric',
            'temperature' => 'required|numeric',
            'assigned_doctor' => 'nullable|string',
        ]);

        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $existingConsultation = Consultation::where('user_id', $user_id)->first();

        if ($existingConsultation) {
            $consultId = $existingConsultation->consult_id;
        } else {
            $userName = strtoupper(substr($user->name, 0, 3));
            $randomDigits = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $consultId = $userName . '-' . $randomDigits;
        }

        $consultation = new Consultation([
            'user_id' => $user_id,
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'bmi' => $request->input('bmi'),
            'blood_pressure' => $request->input('blood_pressure'),
            'pulse_rate' => $request->input('pulse_rate'),
            'blood_sugar' => $request->input('blood_sugar'),
            'temperature' => $request->input('temperature'),
            'assigned_doctor' => $request->input('assigned_doctor'),
            'created_by' => auth()->id(),
            'consult_id' => $consultId,
        ]);

        $consultation->save();

        return redirect()->route('admin.viewconsultations')->with('succes', 'Succes');
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'assigned_doctor' => 'sometimes|nullable|string',
        ]);

        $consultation = Consultation::find($id);
        $consultation->update([
            'assigned_doctor' => $request->input('assigned_doctor'),
        ]);

        return redirect()->route('admin.viewconsultations')->with('success', 'success');
    }


    public function delete($id)
    {
        $consultation = Consultation::find($id);
        $consultation->delete();
        return redirect()->route('admin.viewconsultations')->with('delete', 'delete');
    }
}
