@inject('role', 'App\Http\Helpers\AuthHelper')
@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if ($diagnosis)
                        <h6 class="mb-0 text-center">Lab Result Details for {{ $diagnosis->consultation->user->name }} </h6>
                        <h6 class="mb-0 text-center">Consultation Number: {{ $diagnosis->consultation->consult_id }}</h6>
                        <hr>
                    @endif
                    @if (session('updated'))
                        <div class="alert alert-success text-center">
                            <h4>Lab Result Updated</h4>
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger text-white text-center">
                            <h5>Lab Result Deleted</h5>
                        </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if (!$labtest)
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO RESULT FOR THIS DIAGNOSIS</h5>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lab
                                            Test Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Comments</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Handled By</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created On</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lab
                                            Result File</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $labtest->test_name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $labtest->comments }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $labtest->status }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $labtest->created_by }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">
                                                        {{ \Carbon\Carbon::parse($labtest->created_at)->toDateString() }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($labtest->lab_result)
                                                        <a href="{{ route('admin.labtest.download', ['id' => $labtest->id]) }}"
                                                            class="btn btn-success btn-sm">Download</a>
                                                    @else
                                                        No File
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="dropdown d-flex justify-content-start">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $labtest->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="menu-{{ $labtest->id }}">
                                                    @if ($role->onlyRoles('admin', 'doctor'))
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.add-drug', ['id' => $labtest->id]) }}">Add
                                                                Drugs </a></li>
                                                    @endif
                                                    @if ($role->onlyRoles('admin', 'pharmacy'))
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.user-drug', ['id' => $labtest->id]) }}">Show
                                                                Drugs</a></li>
                                                    @endif
                                                    @if ($role->onlyRoles('admin', 'lab-scientist'))
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.editlabtest', ['id' => $labtest->id]) }}">Update</a>
                                                        </li>
                                                        <li><a class="dropdown-item text-danger"
                                                                href="{{ route('admin.labtest.delete', ['id' => $labtest->id]) }}">Delete</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
