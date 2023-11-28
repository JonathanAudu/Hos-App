@inject('role', 'App\Http\Helpers\AuthHelper')
@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if ($drug)
                        <h6 class="mb-0 text-center">Drug Details for {{$drugUser->user->name}} </h6>
                        <h6 class="mb-0 text-center">Consultation Number: {{$drugUser->consult_id}}</h6>
                        <hr>
                    @endif
                    @if (session('updated'))
                        <div class="alert alert-success text-center">
                            <h4>Drug Updated</h4>
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger text-white text-center">
                            <h5> Drug Deleted</h5>
                        </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if (!$drug)
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO RESULT FOR THIS DIAGNOSIS</h5>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DRUG NAME(s)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CREATED BY</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CREATED ON</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$drug->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$drug->created_by}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{ \Carbon\Carbon::parse($drug->created_at)->toDateString() }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dropdown d-flex justify-content-start">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $drug->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="menu-{{ $drug->id }}">
                                                @if ($role->onlyRoles('admin', 'doctor', 'pharmacy'))
                                                <li><a class="dropdown-item" href="{{route('admin.add-prescription', ['id' => $drug->id])}}">Add Prescriptions </a></li>
                                                @endif
                                                @if ($role->onlyRoles('admin', 'front-desk', 'pharmacy'))
                                                <li><a class="dropdown-item" href="{{route('admin.user-prescription', ['id' => $drug->id])}}">View Prescriptions</a></li>
                                                @endif
                                                @if ($role->onlyRoles('admin'))
                                                <li><a class="dropdown-item" href="{{route('admin.editdrug', ['id' => $drug->id])}}">Update</a></li>
                                                <li><a class="dropdown-item text-danger" href="{{route('admin.drug.delete', ['id' => $drug->id])}}">Delete</a></li>
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
