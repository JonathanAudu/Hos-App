@inject('role', 'App\Http\Helpers\AuthHelper')
<div class="header-w3l">
    <!--header-->
    <header id="site-header" class="header-w3l fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <a class="navbar-brand" href="{{ route('index') }}">

                    {{-- Med<span class="sub-logo">i</span>ck</span> --}}
                </a>
                {{-- <!-- if logo is image enable this --}}
                <a class="navbar-brand" href="#index.html">
                    <img src="../assets/images/SUMAS-logo.png" alt="SUMAS logo" title="SUMAS logo" width=957px />
                </a>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('healthcare')}}">healthcare</a>
              </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact Us</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('getsignin') }}">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('getsignup') }}">Sign Up</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}">Sign Out</a>
                            </li>
                            @if ($role->onlyRoles('admin', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.index') }}">Dashboard</a>
                            </li>
                            @endif
                            @if ($role->onlyRoles('user'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.index') }}">Dashboard</a>
                            </li>
                            @endif
                        @endauth

                        {{-- <li class="search-bar ml-lg-3 mr-lg-5 mt-lg-0 mt-4">
                <form class="search position-relative">
                  <input type="search" class="search__input" name="search" placeholder="Search here.."
                    onload="equalWidth()" required="">
                  <span class="fa fa-search search__icon"></span>
                </form>
              </li> --}}

                    </ul>

                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
</div>
