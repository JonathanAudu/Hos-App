@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">User Details</h6>
                    <hr>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">USER</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE OF
                                        BIRTH
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SEX
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EMAIL
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PHONE
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STATE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID/STATUS</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATED ON</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class=" text-sm">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td >
                                        <h6 class="text-xs-center font-weight-bold">{{ $user->dob }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-xs-center font-weight-bold ">{{ $user->gender }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-xs-center font-weight-bold ">{{ $user->email }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-xs-center font-weight-bold">{{ $user->phone }}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <h6 class="text-xs font-weight-bold">{{ $user->state }}</h6>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-secondary text-xs font-weight-bold">{{ $user->user_id }}</p>
                                        @if ($user->subscribed)
                                            <span class="badge bg-success">Subscribed</span>
                                        @else
                                            <span class="badge bg-secondary">Unsubscribed</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->staff_name }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
