<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use App\Models\Examination;
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
        // Fetch the latest consultations for each examination_id
        $latestConsultations = Consultation::with(['examination.user:id,name,email,phone,dob,gender'])
            ->select('examination_id', DB::raw('MAX(created_at) as latest_date'))
            ->groupBy('examination_id')
            ->get();

        $latestConsultations = Consultation::whereIn('created_at', function ($query) use ($latestConsultations) {
            $query->select(DB::raw('MAX(created_at)'))
                ->from('consultations')
                ->whereIn('examination_id', $latestConsultations->pluck('examination_id'))
                ->groupBy('examination_id');
        })->get();



        return view('admin.viewconsultation', compact('latestConsultations'));
    }


    public function getConsultation($examination_id)
    {
        $consultations = DB::table('consultations')
            ->select('consultations.*', 'users.name as user_name')
            ->join('examinations', 'consultations.examination_id', '=', 'examinations.id')
            ->join('users', 'examinations.user_id', '=', 'users.id')
            ->where('consultations.examination_id', $examination_id)
            ->get();

        return view('admin.consultation', compact('consultations'));
    }





    public function indexForm($id)
    {
        $examination = Examination::find($id);
        $user = $examination->user;
        return view('admin.addconsultation', compact('examination', 'user'));
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
        $examinationId = $request->input('examination_id');
        $userId =  auth()->user()->name;

        $existingConsultation = Consultation::where('examination_id', $examinationId)
            ->where('created_by', $userId)
            ->first();

        if ($existingConsultation) {
            return back()->with('error', 'error');
        }

        $validatedData = $request->validate([
            'examination_id' => 'required|exists:examinations,id',
            'diagnosis' => 'sometimes|string',
            'provisional_diagnosis' => 'sometimes|string',
            'comments' => 'nullable|string',
        ]);

        $consultation = new Consultation($validatedData);
        $consultation->created_by = $userId;
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
