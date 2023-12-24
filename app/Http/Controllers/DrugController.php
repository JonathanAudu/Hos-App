<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\LabTest;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function drugForm($id)
    {
        $labtest = LabTest::with('consultation')->find($id);
        $drug = $labtest->consultation->examination;

        // dd($drug->user->name);

        return view('admin.add-drug', compact('labtest', 'drug'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'labtest_id' => 'required|exists:labtests,id',
            'name' => 'required|string',
            'comments' => 'sometimes|string',
        ]);

        $userId = auth()->user()->name;
        // Check if a drug has already been created for the latest labtest_id
        $latestLabtestId = $validatedData['labtest_id'];
        $existingDrug = Drug::where('labtest_id', $latestLabtestId)->first();

        if ($existingDrug) {
            return back()->with('error', 'error');
        }

        $validatedData['created_by'] = $userId;

        // Create a new drug record
        $drug = new Drug($validatedData);
        $drug->save();

        return back()->with('success', 'success');
    }



    public function show($id)
    {
        $drug = Drug::with('labtest')->where('labtest_id', $id)->first();

        $drugUser = $drug->labtest->consultation->examination;
            //    dd($drugUser);
        return view('admin.user-drug', compact('drug', 'drugUser'));
    }


    public function updateForm($id)
    {
        $drug = Drug::with('labtest')->find($id);
        $drugUser = $drug->labtest->consultation->examination->user;
        ////                dd($drugUser);
        return view('admin.update-drug', compact('drug', 'drugUser'));
    }



    public function update(Request $request, $id)
    {
        $drug = Drug::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'comments' => 'sometimes|string',
        ]);
        $drug->update($validatedData);

        return redirect()->route('admin.user-drug', ['id' => $drug->labtest->id])->with('updated', 'updated');
    }


    public function delete($id)
    {
        $drug = Drug::find($id);
        $drug->delete();
        return back()->with('delete', 'delete');
    }
}
