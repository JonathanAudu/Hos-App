@inject('role', 'App\Http\Helpers\AuthHelper')


<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="" target="">
            <img src="{{ route('logo') }}" alt="SUMAS logo" title="SUMAS logo" width="800px" height="800px" />
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            @if ($role->onlyRoles('admin', 'user', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('admin', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('user'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">My Dashboard</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.addstaff') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Add Staff</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('admin', 'front-desk'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.adduser') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Add User</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.viewstaffdata') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">View Staff</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('admin', 'front-desk', 'accountant', 'nurse','doctor', 'lab-scientist', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.viewuserdata') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">View Users</span>
                    </a>
                </li>
            @endif


            @if ($role->onlyRoles('admin', 'front-desk', 'nurse','doctor', 'lab-scientist', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.viewconsultations') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">View Consultations</span>
                    </a>
                </li>
            @endif

            @if ($role->onlyRoles('user'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.viewconsultations') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">My Consultations</span>
                    </a>
                </li>
            @endif
            @if ($role->onlyRoles('admin', 'front-desk', 'accountant', 'lab-scientist', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.payments.create') }}">
                        <span class="btn btn-success btn-sm">Create Payment</span>
                    </a>
                </li>
            @endif
            @if ($role->onlyRoles('admin',  'front-desk', 'accountant', 'pharmacy'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.payments.index') }}">
                        <span class="btn btn-success btn-sm">View Payment</span>
                    </a>
                </li>
            @endif

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Info</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('account.get') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Update Account</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('signout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>

            @if ($role->onlyRoles('user'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.payments.user-payment') }}">
                        <span class="btn btn-success btn-sm">My Payments</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
