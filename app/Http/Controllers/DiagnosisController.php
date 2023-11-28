<?php

namespace App\Http\Controllers;

use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use App\Models\Diagnosis;
use App\Models\LabTest;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    private $auth;
    public function __construct(AuthHelper $auth){
        $this->auth = $auth;
    }


    public function index($id){
        $consultation = Consultation::find($id);
        return view('admin.add-diagnosis', compact('consultation'));
    }

    public function store(Request $request)
    {
        $consultationId = $request->input('consultation_id');
        $userId =  auth()->user()->name;

        $existingDiagnosis = Diagnosis::where('consultation_id', $consultationId)
            ->where('created_by', $userId)
            ->first();

        if ($existingDiagnosis) {
            return back()->with('error', 'error');
        }

        $validatedData = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'examination' => 'sometimes|string',
            'provisional_diagnosis' => 'sometimes|string',
        ]);

        $diagnosis = new Diagnosis($validatedData);
        $diagnosis->created_by = $userId;
        $diagnosis->save();

        return redirect()->route('admin.viewconsultations', $diagnosis->id)->with('suc', 'suc');
    }


    public function updateForm($id)
    {
        $diagnosis = Diagnosis::with('consultation')->find($id);
        return view('admin.update-diagnosis', compact('diagnosis'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'examination' => 'sometimes|string',
            'provisional_diagnosis' => 'sometimes|string',
        ]);

        $diagnosis = Diagnosis::findOrFail($id);

//        if ($diagnosis->created_by != auth()->id()) {
//            return back()->with('error', 'You are not authorized to update this diagnosis.');
//        }

        $diagnosis->update($validatedData);

//        return redirect()->route('admin.user-diagnosis', $diagnosis->id)->with('success', 'success');
        return redirect()->route('admin.viewconsultations', $diagnosis->id)->with('cess', 'cess');
    }




    public function showDiagnosis($id) {
        $diagnosis = Diagnosis::where('consultation_id', $id)->first();
        $consultation = Consultation::find($id);
        $labtest = LabTest::find($id);


        return view('admin.user-diagnosis', compact('diagnosis', 'consultation', 'labtest'));
    }


    public function delete($id){
        $diagnosis = Diagnosis::find($id);
        $diagnosis->delete();
        return back()->with('delete', 'delete');
    }


}
