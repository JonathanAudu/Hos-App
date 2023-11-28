@php
    $states = ['FCT', 'Lagos'];
@endphp

@extends('dash-layout')

@section('body')
<main class="main-content mt-0 ps">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-5 mx-auto">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url(https://unsplash.it/1200/800);background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class=" text-white font-weight-bolder position-relative">"Health is Wealth"</h4>
                            <p class="text-white position-relative">Get quality sexual and reproductive healthcare
                                from SUMASTH.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-7 mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h1 class="text-black mb-1 ">Welcome!</h1>
                                <p class="text-lead text-black">Sign up to contact us.</p>
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
                                        Sign Up Success
                                        <p>Please sign in and change the default password: 123456</p>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <form role="form" action="{{ route('postsignup') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Full name"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="phone" maxlength="11" class="form-control form-control-lg" name="phone"
                                            id="phone" placeholder="phone" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth:</label>
                                        <input type="date" class="form-control" name="dob" id="dob"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="state" class="form-label">State:</label>
                                        <select name="state" class="form-select" id="state" required>
                                            @foreach ($states as $state)
                                                <option value="{{ $state }}">{{ $state }}</option>
                                            @endforeach
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
                                        <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Sign
                                            up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{ route('postsignin') }}" class="text-dark font-weight-bolder">Sign in</a>
                                </p>
                                <p class="mb-4 text-sm mx-auto">
                                    <a href="{{ route('index') }}"
                                        class="text-primary text-gradient font-weight-bold">HOME PAGE</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ps__rail-x">
        <div class="ps__thumb-x" tabindex="0"></div>
    </div>
    <div class="ps__rail-y">
        <div class="ps__thumb-y" tabindex="0"></div>
    </div>
</main>
@endsection
