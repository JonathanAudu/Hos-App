<?php

namespace App\Http\Controllers;

use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use App\Models\Diagnosis;
use App\Models\Drug;
use App\Models\LabTest;
use App\Models\Prescription;
use App\Models\Subscriptions;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // roles: 'user', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'
    private $auth;
    public function __construct(AuthHelper $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $consultationCount = Consultation::where('user_id', auth()->id())->count();

        $consultations = Consultation::with(['user', 'createdBy'])
            ->where('user_id', auth()->id())
            ->get();

        return view('admin.indexuser', compact('consultationCount', 'consultations'));
    }




    public function viewconsultations()
    {

        $userId = auth()->id();

        $consultations = Consultation::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.viewuserconsultations', compact('consultations'));
    }



    public function show($consultation_id)
    {
        $consultation = Consultation::with('diagnosis')->findOrFail($consultation_id);
        $diagnosis = $consultation->diagnosis;
        //        dd($diagnosis->examination);
        return view('admin.showdiagnosis', compact('consultation', 'diagnosis'));
    }





    public function labResult($id)
    {
        $labtest = LabTest::where('diagnosis_id', $id)->first();
        $diagnosis = Diagnosis::with('consultation')->find($id);
        $lab = $labtest->diagnosis;

        //                dd($lab->consultation->user->name);

        return view('admin.showlabresult', compact('labtest', 'diagnosis', 'lab'));
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



    public function viewdrugprescription($id)
    {
        $labtest = LabTest::with('diagnosis')->find($id);
        $drug = Drug::where('labtest_id', $id)->first();
        $prescription = Prescription::where('drug_id', $drug->id)->first();
        $drugUser = $labtest->diagnosis->consultation;
        //        dd($prescription);

        return view('admin.showdrugprescription', compact('drug', 'prescription', 'labtest', 'drugUser'));
    }


    public function viewpayments()
    {
        $userId = auth()->id();

        $payments = UserPayment::where('user_id', $userId)->get();

        return view('admin.paymentstatus', compact('payments'));
    }
}
