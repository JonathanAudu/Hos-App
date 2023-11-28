@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3 class="mb-0 text-center font-weight-bolder">All Payments</h3>
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h4> Payment wStatus Updated</h4>
                        </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Fee (₦)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $index => $payment)
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-3">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm">{{ $index + 1 }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-3 py-3">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm">{{ $payment->payment }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-3 py-3">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm">{{ $payment->fee }}</h6>
                                        </div>
                                    </div>
                                </td>
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
                                            @if ($payment->status == 'pending')
                                                <span class="badge rounded-pill bg-danger">Pending</span>
                                            @elseif ($payment->status == 'paid')
                                                <span class="badge rounded-pill bg-success">Paid</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-3 py-3">
                                        <div class="d-flex flex-column justify-content-center">
                                            <div class="btn-group">
                                                <span class="badge rounded-pill bg-secondary"><a class="dropdown-item badge" href="{{route('admin.payment.status', ['id'=>$payment->id])}}">CHANGE PAYMENT STATUS</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $payments->links() }}
        </div>
    </div>
@endsection
