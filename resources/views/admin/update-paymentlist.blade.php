@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>UPDATE PAYMENT LIST</h5>
                </div>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <strong>Whoops!</strong> There were some problems with your input:<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form role="form" action="{{ route('admin.paymentlist.update', ['id' => $payment->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="payment_desc" class="form-label">Payment Description</label>
                            <input type="text" class="form-control" id="payment_desc" name="payment_desc" value="{{ old('payment_desc', $payment->payment_desc) }}">
                        </div>

                        <div class="mb-3">
                            <label for="payment_fee" class="form-label">Payment Fee (&#8358;)</label>
                            <input type="number" step="0.01" class="form-control" id="payment_fee" name="payment_fee" value="{{ old('payment_fee', $payment->payment_fee) }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update Payment List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
