@inject('role', 'App\Http\Helpers\AuthHelper')

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">HELLO</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0 text-uppercase">{{auth()->user()->name}}</h6>
        </nav>

        <div class="collapse navbar-collapse py-3 px-3 mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">

                    @if($role->onlyRoles('admin','staff','medical'))
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <form action="{{route('admin.search')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" name="search" class="form-control" placeholder="Search Here..." onfocus="focused(this)" onfocusout="defocused(this)">
                                <select name="type" class="form-select" id="type" required>
                                    <option value="name">Name</option>
                                    <option value="phone">Phone</option>
                                    <option value="email">Email</option>
                                    <option value="user_id">User ID</option>
                                    <option value="status">Status</option>
                                    <option value="amount">Amount</option>
                                    <option value="payment_desc">Payment Description</option>

                                </select>
                            </div>
                        </form>
                    </div>
                    @endif

                    {{-- <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="./dashboard/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>
