@extends('admin.dashboard')

@section('pages')



    <div class="row">
        <div class="col-12">
            <div class="card z-index-0 justify-content-center">
                <div class="card-header text-center pt-4">
                    <h5>Add Staff</h5>
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
                    <form role="form" action="{{ route('admin.submitstaff') }}" method="POST">
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
                            <input type="phone" maxlength="11" class="form-control" name="phone" id="phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select name="role" class="form-select" id="role" required>
                                <option value="admin">Admin</option>
                                <option value="doctor">Doctor</option>
                                <option value="nurse">Nurse</option>
                                <option value="pharmacy">Pharmacy</option>
                                <option value="lab-scientist">Lab Scientist</option>
                                <option value="accountant">Accountant</option>
                                <option value="front-desk">Front-Desk</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <select name="gender" class="form-select" id="gender" required>
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
