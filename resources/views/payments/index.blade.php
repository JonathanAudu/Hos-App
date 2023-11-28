@extends('admin.dashboard')
@inject('role', 'App\Http\Helpers\AuthHelper')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3 class="mb-0 text-center font-weight-bolder">PAYMENTS</h3>
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h4>Payment list added successfully</h4>
                        </div>
                    @endif
                    @if (session('updated'))
                        <div class="alert alert-success text-center">
                            <h4>Payment list updated</h4>
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-success text-center">
                            <h4>Payment list deleted</h4>
                        </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">PATIENT NAME</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">DESCRIPTION</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">AMOUNT (&#8358;)
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">STATUS
                                    </th>
                                    @if ($role->onlyRoles('admin', 'accountant'))
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">ACTION</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serialNumber = 1;
                                @endphp
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $serialNumber++ }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ optional($payment->user)->name }}</h6>
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
                                                    @if ($payment->status == 'paid')
                                                        <button class="btn btn-success">Paid</button>
                                                    @elseif ($payment->status == 'failed')
                                                        <button class="btn btn-danger">Failed</button>
                                                    @else
                                                        <button class="btn btn-warning">Pending</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>


                                        @if ($role->onlyRoles('admin', 'accountant'))
                                        <td>
                                            <div class="dropdown d-flex justify-content-start">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $payment->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="menu-{{ $payment->id }}">

                                                    {{-- <li><a class="dropdown-item text-danger"
                                                            href="">Delete</a>
                                                    </li> --}}
                                                    @if ($payment->status == 'pending')
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.payments.confirm', ['id' => $payment->id]) }}"><button type="button" class="btn btn-success" style="width: 100%; margin-bottom: 0px;">
                                                                    CLICK TO CONFIRM PAYMENT
                                                                </button></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
