@extends('dash-layout')

@section('body')
<main class="main-content mt-0 ps">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row justify-content-center mt-9">
                    <div class="col-xl-6 col-lg-5 col-md-7">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h1 class="text-black mb-1">Confirm New Password</h1>
                                <p class="text-lead text-black">Confirm your new password.</p>
                            </div>
                            <div class="row">
                                <div class="row">
                                    @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <form role="form" action="{{ route('password.update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password:</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Confirm Password</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Back to sign in?
                                    <a href="{{ route('postsignin') }}" class="text-dark font-weight-bolder">Sign in</a>
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
