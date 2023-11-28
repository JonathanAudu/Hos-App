<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Display a list of payments
    public function index()
    {
        $users = User::all();
        $payments = Payment::all();
        return view('payments.index', compact('users', 'payments'));
    }

    // Front Desk: Create a payment
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('payments.create', compact('users'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'payment_desc' => 'required|string',
            'amount' => 'required|numeric',
            'payment_type' => 'required|in:pos,transfer,cash',
        ]);

        $validatedData['status'] = 'pending';
        $payment = Payment::create($validatedData);

        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully.');
    }

    // Accountant: Confirm payment
    public function confirmPayment($id)
    {
        // Find the payment by ID
        $payment = Payment::findOrFail($id);

        // Update payment status to 'paid'
        $payment->status = 'paid';
        $payment->save();

        return redirect()->route('admin.payments.index')->with('success', 'Payment confirmed successfully.');
    }


    public function viewUserPayments()
    {
        $user = Auth::user();

        // Fetch the payments associated with the user
        $Payments = $user->payments;

        // You can also use eager loading to load the user relationship with payments to avoid N+1 query issues
        // $userPayments = $user->payments()->with('user')->get();
        return view('payments.user-payment', compact('Payments'));
    }
}
