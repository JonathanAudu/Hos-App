@inject('role', 'App\Http\Helpers\AuthHelper')
@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h4>Lab Result Created</h4>
                        </div>
                    @endif
                    @if ($consultation)
                        <h6 class="mb-0 text-center">Diagnosis Details for {{ $consultation->user->name }}</h6>
                        <h6 class="mb-0 text-center">Consultation Number: {{ $consultation->consult_id }}</h6>
                        <hr>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if (!$diagnosis)
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO DIAGNOSIS FOR THIS CONSULTATION</h5>
                        </div>
                    @else
                        <div  class="table-responsive p-0" style="min-height: 600px">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Examination</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lab Test Message</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $diagnosis->examination }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $diagnosis->provisional_diagnosis }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown d-flex justify-content-start">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $diagnosis->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="menu-{{ $diagnosis->id }}">
                                                    @if ($role->onlyRoles('admin', 'lab-scientist'))
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.add-labtest', ['id' => $diagnosis->id]) }}">Add
                                                                Lab-Test
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($role->onlyRoles('admin', 'front-desk', 'doctor', 'lab-scientist', 'pharmacy'))
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.user-labtest', ['id' => $diagnosis->id]) }}">Lab
                                                                Result
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($role->onlyRoles('admin', 'doctor'))
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('admin.editdiagnosis', ['id' => $diagnosis->id]) }}">Update</a>
                                                    </li>

                                                        <li><a class="dropdown-item text-danger"
                                                                href="{{ route('admin.diagnosis.delete', ['id' => $diagnosis->id]) }}">Delete</a>
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
