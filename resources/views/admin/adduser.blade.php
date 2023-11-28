@php
    $states = [
        'FCT', 'Lagos'
    ];
@endphp

@extends('admin.dashboard')

@section('pages')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header text-center pt-4">
                <h5>Add User</h5>
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

            <div>
                @if (session('success'))
                    <div class="alert alert-success text-white">
                        Form Submitted
                    </div>
                @endif
            </div>

            <div class="card-body">
                <form role="form" action="{{ route('admin.submituser') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="tel" maxlength="11" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State:</label>
                        <select name="state" class="form-select" id="state" required>
                            <option value="" disabled>Select a state</option>
                            @foreach ($states as $state)
                                <option value="{{$state}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" id="dob" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select name="gender" class="form-select" id="gender" required>
                            <option value="">Select a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 mb-2">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
