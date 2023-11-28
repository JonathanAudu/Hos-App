<?php

namespace App\Http\Controllers;

use App\Http\Helpers\AuthHelper;
use App\Models\Consultation;
use App\Models\FollowUp;
use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // roles: admin, user, staff, medical
    private $auth;
    public function __construct(AuthHelper $auth){
        $this->auth = $auth;
    }

    public function getaccount($id = null){

        $user = User::when(($id !== null && $this->auth->allowRoles('admin')),
            function ($query) use($id) {
                $query->find($id);
            }, function($query){
                $query->find(auth()->id());
            })
            ->first();

        return view('account.update', compact('user'));

    }

    public function updateaccount(Request $request){

        $request->validate([
            // 'name' => 'string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:11',
            'state' => 'required|string',
            'dob' => 'required',
            // 'gender' => 'in:Male,Female',
        ]);

        $id = $request->input('id');
        $form = $request->except('id','_token');

        $update = User::where('id',$id)->update($form);

        if($update) return back()->with('success', 'success.');
        else return back()->with('failed', 'failed');
    }

    public function updatepassword(Request $request){
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find(auth()->id());

        if (Hash::check($request->input('old_password'), $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('password', 'success.');
        }else{
            return back()->with('failed', 'failed.');
        }
    }

    public function resetpassword($id){
        $user = User::find($id);
        $user->password = Hash::make('123456');
        $user->save();

        return back()->with('password', 'success.');
    }

    public function delete($id){
        $user_id = User::find($id);
        Consultation::where('user_id',$user_id)->delete();
        User::destroy($id);

        return back()->with('success', 'success.');
    }

}



