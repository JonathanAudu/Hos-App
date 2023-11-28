@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3 class="mb-0 text-center font-weight-bolder">My Payments</h3>
                </div>
                <div class="card-body p-0">

                    @if (!$Payments->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment
                                        Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment
                                        Fee (₦)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Payments as $payment)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $payment->created_at->format('d-m-Y') }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $payment->payment_desc }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $payment->amount }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($payment->status == 'pending')
                                                        <span class="badge rounded-pill bg-info">Pending</span>
                                                    @elseif ($payment->status == 'paid')
                                                        <span class="badge rounded-pill bg-success">Paid</span>
                                                    @elseif ($payment->status == 'failed')
                                                        <span class="badge rounded-pill bg-danger">Paid</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger text-white text-center">
                            <h5>No payments have been made yet.</h5>
                        </div>
                    @endif
                </div>
            @endsection
