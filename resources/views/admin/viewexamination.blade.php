@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h5>Doctor Assigned</h5>
                        </div>
                    @endif
                    <div>
                        @if (session('succes'))
                            <div class="alert alert-success text-center">
                                <h5>examination Created</h5>
                            </div>
                        @endif
                    </div>
                    <div>
                        @if (session('suc'))
                            <div class="alert alert-success text-center">
                                <h5>Diagnosis Created</h5>
                            </div>
                        @endif
                    </div>
                    <div>
                        @if (session('cess'))
                            <div class="alert alert-success text-center">
                                <h5>Diagnosis updated</h5>
                            </div>
                        @endif
                    </div>
                    <div>
                        @if (session('delete'))
                            <div class="alert alert-danger text-white text-center">
                                <h5>examination Deleted</h5>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-header pb-0">
                    <h6 class="text-center">All examinations </h6>
                </div>
                <div class="card-body p-0">
                    <div class="table">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                        Details
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        examination ID
                                    </th>
                                    @if ($role->onlyRoles('admin', 'front-desk'))
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Assign Doctor
                                        </th>
                                    @endif
                                    @if ($role->onlyRoles('admin', 'doctor', 'lab-scientist'))
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestexaminations as $examination)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $examination->user->name }}</h6>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $examination->user->gender }}</p>
                                                    <p class="text-xs font-weight-bold mb-0">dob:
                                                        {{ $examination->user->dob }}</p>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $examination->user->email }}</p>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $examination->user->phone }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm px-4">{{ $examination->consult_id }}</h6>
                                        </td>
                                        @if ($role->onlyRoles('admin', 'front-desk'))
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.editexamination', ['id' => $examination->id]) }}"
                                                        class="btn btn-primary">Assign Doctor
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                        @if ($role->onlyRoles('admin', 'doctor','lab-scientist', 'pharmacy'))
                                            <td>
                                                <div class="dropdown d-flex justify-content-center">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="menu-{{ $examination->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="menu-{{ $examination->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.examination', ['id' => $examination->user_id]) }}">View
                                                                examination for {{ $examination->user->name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            No Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        {{--                                         {{ $examinations->appends(request()->input())->links() }} --}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
