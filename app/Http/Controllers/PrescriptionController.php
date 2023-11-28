<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function form($id)
    {
        $drug = Drug::findOrFail($id);
        $prescription = $drug->labtest->diagnosis->consultation;

        return view('admin.add-prescription', compact('drug', 'prescription'));
    }

    public function store(Request $request)
    {
        $userName = Auth::user()->name;
        $existingPrescription = Prescription::where('drug_id', $request->input('drug_id'))
            ->where('created_by', $userName)
            ->first();

        if ($existingPrescription) {
            return back()->with('error', 'error');
        }

        $validatedData = $request->validate([
            'drug_id' => 'required|exists:drugs,id',
            'comments' => 'required|string',
            'dosage' => 'required|string',
        ]);

        $validatedData['created_by'] = $userName;

        $prescription = new Prescription($validatedData);
        $prescription->save();

        return back()->with('success', 'success');
    }

    public function show($id)
    {
        $prescription = Prescription::where('drug_id', $id)->first();
        $drug = Drug::with('labtest')->find($id);
        $prescribedUser = $drug->labtest->diagnosis->consultation;

        return view('admin.user-prescription', compact('prescription', 'drug', 'prescribedUser'));
    }

    public function updateForm($id){
        $prescription = Prescription::with('drug')->find($id);
        $prescribedUser = $prescription->drug->labtest->diagnosis->consultation;
        return view('admin.update-prescription', compact('prescription',  'prescribedUser'));

    }


    public function update(Request $request, $id){
        $prescription = Prescription::findOrFail($id);

        $validatedData = $request->validate([
            'drug_id' => 'required|exists:drugs,id',
            'comments' => 'sometimes|string',
            'dosage' => 'sometimes|string',
        ]);
        $prescription->update($validatedData);

        return redirect()->route('admin.user-prescription', ['id' => $prescription->drug->id])->with('updated', 'updated');
    }


    public function delete($id){
        $prescription = Prescription::find($id);
        $prescription->delete();
        return back()->with('delete', 'delete');
    }
}
