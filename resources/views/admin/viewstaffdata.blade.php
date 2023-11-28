@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">STAFF LISTS</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Staff Details
                                    </th>


                                    <th
                                        class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created By
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-6 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Name : {{ $user->name }}</h6>
                                                    <p class="text-xs font-weight-bold mb-0">Job : {{ $user->role }}</p>
                                                    <p class="text-xs font-weight-bold mb-0">Email : {{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center">
                                            @if ($user->createdBy)
                                            <span class="text-secondary text-xs font-weight-bold">{{  $user->createdBy->name }}</span>
                                            @else
                                            <span class="text-secondary text-xs font-weight-bold">N/A</span>
                                        @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $user->user_id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="menu-{{ $user->user_id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('account.get', ['id' => $user->id]) }}">Update
                                                            Account</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('account.resetpassword', ['id' => $user->id]) }}">Reset
                                                            Password</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('account.delete', ['id' => $user->id]) }}">Delete
                                                            Account</a></li>
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
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        {{ $users->appends(request()->input())->links() }}
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
