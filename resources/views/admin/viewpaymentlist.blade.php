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
                    @if($role->onlyRoles('admin','accountant'))
                    <div class="text-white text-center d-md-flex justify-content-md-end px-3">
                        <a href="{{ route('admin.add-paymentlist') }}">
                            <h6 class="btn btn-primary">CLICK TO ADD</h6>
                        </a>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">AMOUNT (&#8358;)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DESCRIPTION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
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
                                                <h6 class="text-sm">{{ $payment->payment_fee }}</h6>
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
                                        <div class="dropdown d-flex justify-content-start">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="menu-{{ $payment->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="menu-{{ $payment->id }}">
                                                <li><a class="dropdown-item" href="{{route('admin.editpaymentlist', ['id' => $payment->id])}}">Update</a></li>
                                                <li><a class="dropdown-item text-danger" href="{{route('admin.paymentlist.delete', ['id' => $payment->id])}}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
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
