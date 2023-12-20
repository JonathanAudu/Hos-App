<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Http\Helpers\AuthHelper;
use Illuminate\Support\Facades\DB;

class ExaminationController extends Controller
{
     // roles:'user', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'
     private $auth;
     public function __construct(AuthHelper $auth)
     {
         $this->auth = $auth;
     }

     public function index()
     {
         // Fetch the latest examinations for each user
         $examinations = Examination::select('user_id', DB::raw('MAX(created_at) as latest_date'))
             ->groupBy('user_id');

         $latestExaminations = Examination::whereIn('id', function ($query) use ($examinations) {
             $query->select(DB::raw('MAX(id)'))
                 ->from('examinations')
                 ->groupBy('user_id')
                 ->get();
         })->with(['user:id,name,email,phone,dob,gender'])->get();


         return view('admin.viewexamination', compact('latestExaminations'));
     }


     public function getExamination($user_id)
     {
         $examinations = DB::table('examinations')
             ->select('examinations.*', 'users.name as user_name') // Select the name from users
             ->join('users', 'examinations.user_id', '=', 'users.id')
             ->where('examinations.user_id', $user_id) // Use 'examinations.user_id' to filter by user ID
             ->get();

         //        dd($examinations[0]->id);
         return view('admin.examination', compact('examinations'));
     }


     public function indexForm($id)
    {
        $user = User::find($id);

        return view('admin.addexamination', compact('user'));
    }


    public function editForm($id)
    {
        $Examination = Examination::find($id);
        // Fetch all doctors
        $doctors = User::where('role', 'doctor')->get();

        return view('admin.updateexamination', compact('examination', 'doctors'));
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
            'comments' => 'nullable|string',
            'assigned_doctor' => 'nullable|string',
        ]);

        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $examination = new Examination([
            'user_id' => $user_id,
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'bmi' => $request->input('bmi'),
            'blood_pressure' => $request->input('blood_pressure'),
            'pulse_rate' => $request->input('pulse_rate'),
            'blood_sugar' => $request->input('blood_sugar'),
            'temperature' => $request->input('temperature'),
            'comments' => $request->input('comments'),
            'assigned_doctor' => $request->input('assigned_doctor'),
            'created_by' => auth()->id(),
        ]);

        $examination->save();

        return redirect()->route('admin.viewexaminations')->with('succes', 'Succes');
    }

}
