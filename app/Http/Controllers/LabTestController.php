<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LabTestController extends Controller
{
    public function labForm($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return view('admin.add-labtest', compact('diagnosis'));
    }


    public function updateForm($id)
    {
        $labtest = LabTest::with('diagnosis')->find($id);
        //        dd($labtest->diagnosis->consultation->user->name);
        return view('admin.update-labtest', compact('labtest'));
    }


    public function store(Request $request)
    {
        $diagnosisId = $request->input('diagnosis_id');
        $userId = auth()->user()->name;

        $existingLabtest = LabTest::where('diagnosis_id', $diagnosisId)->first();

        if ($existingLabtest) {
            return back()->with('error', 'error');
        }

        $validatedData = $request->validate([
            'diagnosis_id' => 'required|exists:diagnosis,id',
            'test_name' => 'required|string',
            'comments' => 'required|string',
            'status' => 'sometimes|string',
            'lab_result' => [
                'required',
                'file',
                'max:5120',
                'mimes:pdf,doc,docx,xls,xlsx',
            ],
        ]);

        $file = $request->file('lab_result');

        // Generate a unique file name with the original extension
        $fileName = 'lab-result-'. uniqid() . $file->getClientOriginalName();

        // Store the file in a designated storage disk (e.g., 'public')
        Storage::disk('public')->putFileAs('', $file, $fileName);

        // Create a new LabTest record and associate it with the uploaded file
        $labtest = new LabTest($validatedData);
        $labtest->created_by = $userId;
        $labtest->lab_result = $fileName;
        $labtest->save();

        return redirect()->route('admin.user-diagnosis', ['id' => $labtest->diagnosis->id])->with('success', 'success');
    }


    public function labResult($id)
    {
        $labtest = LabTest::where('diagnosis_id', $id)->first();
        $diagnosis = Diagnosis::with('consultation')->find($id);
        //        dd($labtest->diagnosis->consultation->user->name);

        return view('admin.user-labtest', compact('labtest', 'diagnosis'));
    }


    public function download($id)
    {
        $labTest = LabTest::find($id);

        if (!$labTest || !$labTest->lab_result) {
            abort(404);
        }

        $fileName = $labTest->lab_result;

        // Get the original file's content from the 'public' disk
        $fileContent = Storage::disk('public')->get($fileName);

        // Determine the original file's content type
        $contentType = Storage::disk('public')->mimeType($fileName);

        // Prepare the response for file download
        return response()
            ->stream(
                function () use ($fileContent) {
                    echo $fileContent;
                },
                200,
                [
                    'Content-Type' => $contentType,
                    'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                ]
            );
    }



    public function update(Request $request, $id)
{
    $labtest = LabTest::findOrFail($id);
    $userId = auth()->user()->name;

    $validatedData = $request->validate([
        'test_name' => 'sometimes|string',
        'comments' => 'sometimes|string',
        'status' => 'sometimes|string',
        'handled_by' => 'nullable|string',
        'lab_result' => [
            'sometimes',
            'file',
            'mimes:pdf,doc,docx,xls,xlsx',
            'max:5120',
        ],
    ]);

    if ($request->hasFile('lab_result')) {
        $file = $request->file('lab_result');

        // Generate a unique file name with the original extension
        $originalFileName = $file->getClientOriginalName();
        $fileName = 'lab-result-' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the new file with the correct filename and extension
        Storage::disk('public')->putFileAs('', $file, $fileName);

        // Delete the previous lab result file, if it exists
        if ($labtest->lab_result) {
            Storage::disk('public')->delete($labtest->lab_result);
        }

        // Update the lab result field with the new filename
        $labtest->lab_result = $fileName;
    }

    $labtest->created_by = $userId;
    $labtest->save($validatedData);

    return redirect()->route('admin.user-labtest', ['id' => $labtest->diagnosis->id])->with('updated', 'updated');
}


    public function delete($id)
    {
        $labtest = LabTest::find($id);
        $labtest->delete();
        return back()->with('delete', 'delete');
    }
}
