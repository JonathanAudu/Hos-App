<?php

namespace App\Http\Controllers;

use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use App\Models\Examination;
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
        $examinationCount = Examination::where('user_id', auth()->id())->count();

        $examinations = Examination::with(['user', 'createdBy'])
            ->where('user_id', auth()->id())
            ->get();

        return view('admin.indexuser', compact('examinationCount', 'examinations'));
    }




    public function viewexaminations()
    {

        $userId = auth()->id();

        $examinations = Examination::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.viewuserexaminations', compact('examinations'));
    }


    public function viewconsultations()
    {

        $userId = auth()->id();

        $consultations = Consultation::where('examination_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.viewuserconsultations', compact('consultations'));
    }



    public function show($examination_id)
    {
        $examination = Examination::findOrFail($examination_id);
        $consultation = $examination->consultation->first();
            //    dd($consultation->diagnosis);
        return view('admin.showdiagnosis', compact('examination', 'consultation'));
    }





    public function labResult($id)
    {
        $labtest = LabTest::where('consultation_id', $id)->first();
        $consultation = Consultation::with('examination')->find($id);
        $lab = $labtest->consultation->examination;

                    //    dd($lab->user->name);

        return view('admin.showlabresult', compact('labtest', 'consultation', 'lab'));
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
        $labtest = LabTest::with('consultation')->find($id);
        $drug = Drug::where('labtest_id', $id)->first();
        $prescription = Prescription::where('drug_id', $drug->id)->first();
        $drugUser = $labtest->consultation->examination;
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
