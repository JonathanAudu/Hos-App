@inject('role', 'App\Http\Helpers\AuthHelper')
@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if (session('updated'))
                        <div class="alert alert-success text-center">
                            <h4>Prescription updated successfully.</h4>
                        </div>
                    @endif
                    @if ($prescription)
                        <h6 class="mb-0 text-center">Drug Prescription for {{$prescribedUser->user->name}} </h6>
                        <h6 class="mb-0 text-center">Consultation Number: {{$prescribedUser->consult_id}} </h6>
                        <hr>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger text-white text-center">
                            <h5>Prescription Deleted</h5>
                        </div>
                    @endif
                </div>
                <div class="card-body p-0">
                    @if (!$prescription)
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO PRESCRIPTION FOR THIS DRUG(s).</h5>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comments</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dosage</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created On</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$prescription->comments}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$prescription->dosage}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$prescription->created_by}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{ \Carbon\Carbon::parse($prescription->created_at)->toDateString() }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="dropdown d-flex justify-content-start">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $prescription->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="menu-{{ $prescription->id }}">
                                                @if ($role->onlyRoles('admin', 'doctor', 'pharmacy'))
                                                <li><a class="dropdown-item" href="{{route('admin.editprescription', ['id' => $prescription->id])}}">Update</a></li>
                                                @endif
                                                @if ($role->onlyRoles('admin'))
                                                <li><a class="dropdown-item text-danger" href="{{route('admin.prescription.delete', ['id' => $prescription->id])}}">Delete</a></li>
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
