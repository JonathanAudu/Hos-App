@php
    $states = [
        'FCT', 'Lagos'
    ]
@endphp

@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')

    <div class="row">
        <div class="col-12">
            <div class="card z-index-0 justify-content-center">
                <div class="card-header text-center pt-4">
                    <h5>Update Account</h5>
                    @if($role->allowRoles('admin')) <p>For: {{$user->name}}</p> @endif
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
                            Account Updated
                        </div>
                    @endif
                </div>

                <div>
                    @if (session('failed'))
                        <div class="alert alert-error text-white">
                            Update Error, Worng Old Password
                        </div>
                    @endif
                </div>

                <div>
                    @if (session('password'))
                        <div class="alert alert-success text-white">
                            Password Reset
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form role="form" action="{{ route('account.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">

                        @if($role->allowRoles('admin'))
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>
                        </div>
                        @endif

                        @if(!$role->allowRoles('admin')) <p>Name: {{$user->name}}</p> @endif
                        @if(!$role->allowRoles('admin')) <p>Gender: {{$user->gender}}</p> @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="phone" maxlength="11" class="form-control" name="phone" id="phone" value="{{$user->phone}}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="state" class="form-label">State:</label>
                            <select name="state" class="form-select" id="state" required>
                                <option value="" disabled>Select a state</option>
                                @foreach ($states as $state)
                                    <option value="{{$state}}" @selected($state === $user->state)>{{$state}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{$user->dob}}" required>
                        </div>

                        @if($role->allowRoles('admin'))
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <select name="gender" class="form-select" id="gender" required>
                                <option value="">Select a gender</option>
                                <option value="Male" @selected($user->gender === 'Male')>Male</option>
                                <option value="Female"  @selected($user->gender === 'Female')>Female</option>
                            </select>
                        </div>
                        @endif
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update User</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <form role="form" action="{{ route('account.updatepassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password:</label>
                            <input type="old_password" minlength="6" class="form-control" name="old_password" id="old_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" minlength="6" class="form-control" name="password" id="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Repeat Password:</label>
                            <input type="password" minlength="6" class="form-control" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update Password</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection
