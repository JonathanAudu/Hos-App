<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\PaymentList;
use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    public function createPaymentForm($id)
    {
        $paymentList = PaymentList::all();
        $consultation = Consultation::findOrFail($id);

//        dd($consultation->id);

        return view('admin.add-userpayment', compact('paymentList', 'consultation'));
    }

    public function storePayment(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'consultation_id' => 'required',
            'payment' => 'required',
            'fee' => 'required|numeric',
        ]);

        $payment = new UserPayment($validatedData);
        $payment->created_by = auth()->user()->name;
        $payment->save();

//        dd($payment);

        return redirect()->route('user.payment.show', ['user_id'=> $payment->user_id])->with('success', 'success');
    }


    public function index($user_id) {
        $user = User::with('userpayments')->find($user_id);

        $payments = $user->userpayments;
        $user_id = $user->id;
//        dd($payments);

        return view('admin.paymentstatus', compact('payments', 'user_id'));
    }




}
