@extends('dash-layout')

@section('body')
    <main class="main-content mt-0 ps">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="row">
                                    @if (session('status'))
                                        <div class="alert alert-success text-white">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger text-white">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
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
                                    @if (session('failed'))
                                        <div class="alert alert-success text-white">
                                            Incorrect Email/Password
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <form role="form" action="{{ route('postsignin') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                aria-label="Email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="rememberme"
                                                id="rememberMe" value="1">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('getsignup') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                    <p class="mb-4 text-sm mx-auto">
                                        <a href="{{ route('index') }}"
                                            class="text-primary text-gradient font-weight-bold">HOME PAGE</a>
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        <a href="{{ route('password.request') }}"
                                            class="text-primary text-gradient font-weight-bold">Forgot Password?</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url(https://unsplash.it/1200/800);background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Health is the new
                                    currency"</h4>
                                <p class="text-white position-relative">Get quality sexual and reproductive healthcare
                                    from SUMASTH.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>
@endsection
