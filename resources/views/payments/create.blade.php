@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>CREATE PAYMENTS FOR PATIENTS</h5>
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
                    <form role="form" action="{{ route('admin.payments.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="" selected disabled hidden>Select Patient Name</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_desc">Payment Description</label>
                            <input type="text" class="form-control" id="payment_desc" name="payment_desc" required>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Payment Type</label>
                            <select class="form-select" id="payment_type" name="payment_type" required>
                                <option value="pos">POS</option>
                                <option value="transfer">Transfer</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
