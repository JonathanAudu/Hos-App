@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                                <h5 class="font-weight-bolder">
                                    {{ $user_count }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Consultations</p>
                                <h5 class="font-weight-bolder">
                                    {{ $consultation_count }}
                                </h5>
                                {{-- <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                </p> --}}
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">New Users</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->name }}</p>
                                                <h6 class="text-xs mb-0">{{ $user->gender }}</h6>
                                                <h6 class="text-xs mb-0">dob: {{ $user->dob }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <h6 class="text-xs mb-0">{{ $user->email }}</h6>
                                                <h6 class="text-xs mb-0">{{ $user->phone }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">State</p>
                                            <h6 class="text-sm mb-0">{{ $user->state }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Created By</p>
                                            <h6 class="text-sm mb-0">{{ $user->staff_name }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">created On:</p>
                                            <h6 class="text-sm mb-0">{{ $user->created_at }}</h6>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No User</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-lg-0 mb-4 mt-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Latest Consultations</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                @forelse ($consultations as $user)
                                    <tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="ms-4">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $user->name }}</p>
                                                    <h6 class="text-xs mb-0">{{ $user->gender }}</h6>
                                                    <h6 class="text-xs mb-0">dob: {{ $user->dob }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">State</p>
                                                <h6 class="text-sm mb-0">{{ $user->state }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Consulted By</p>
                                                <h6 class="text-sm mb-0">{{ $user->medical_name }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Consulted On:</p>
                                                <h6 class="text-sm mb-0">{{ $user->created_at }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No User</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $consultations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
