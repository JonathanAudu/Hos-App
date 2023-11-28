@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>PAYMENT LISTS</h5>
                </div>
                {{-- @if (session('error'))
                    <div class="alert alert-danger text-center">
                        <h4>Drug Record already created for this user's lab test</h4>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h4>Drug created successfully.</h4>
                    </div>
                @endif --}}
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
                    <form role="form" action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="payment_desc">Payment Description</label>
                            <input type="text" class="form-control" id="payment_desc" name="payment_desc" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment_fee">Payment Fee</label>
                            <input type="number" step="0.01" class="form-control" id="payment_fee" name="payment_fee"
                                required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Add Payment List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
