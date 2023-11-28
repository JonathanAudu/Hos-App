@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">Users</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        State</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID/Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created On</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created By</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $user->gender }}</p>
                                                    <p class="text-xs font-weight-bold mb-0">dob: {{ $user->dob }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->phone }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user->state }}</span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($user->createdBy)
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $user->createdBy->name }}
                                            </span>
                                        @else
                                            <span class="text-secondary text-xs font-weight-bold">N/A</span>
                                @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="menu-{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="menu-{{ $user->id }}">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.user-profile', ['id' => $user->id]) }}">View</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('account.get', ['id' => $user->id]) }}">Update
                                                    Account</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('account.resetpassword', ['id' => $user->id]) }}">Reset
                                                    Password</a></li>
                                            @if ($role->onlyRoles('admin'))
                                                <li><a class="dropdown-item"
                                                        href="{{ route('account.delete', ['id' => $user->id]) }}">Delete
                                                        Account</a></li>
                                            @endif
                                            @if ($role->onlyRoles('admin', 'front-desk', 'nurse'))
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.addconsultation', ['id' => $user->id]) }}">Create
                                                        Consultation</a></li>
                                            @endif


                                            @if ($role->onlyRoles('admin', 'doctor', 'nurse', 'front-desk'))
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.viewconsultations', ['type' => 'user', 'id' => $user->user_id]) }}">View
                                                        Consultations</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="7">
                                            No Data
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            {{ $users->links() }}
                                        </td>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
