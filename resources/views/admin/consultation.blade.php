@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">All Consultation/Diagnosis Details for </h6>
                    <h6 class="mb-0 text-center">Consultation ID : </h6>
                    <hr>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0" style="min-height: 600px">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Diagnosis
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Underlying Illness
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Doctor's
                                        Comments
                                    </th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Handled By
                                    </th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATED ON
                                    </th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultations as $index => $consultation)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{ $index + 1 }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->diagnosis }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->provisional_diagnosis }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->comments }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->created_by }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">
                                                        {{ \Carbon\Carbon::parse($consultation->created_at)->toDateString() }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($role->onlyRoles('admin', 'doctor', 'lab-scientist', 'pharmacy'))
                                            <td>
                                                <div class="dropdown d-flex justify-content-center">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="menu-{{ $consultation->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="menu-{{ $consultation->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.user-labtest', ['id' => $consultation->id]) }}">View
                                                                Lab Result</a></li>
                                        @endif
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">create lab test</a></li> --}}
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">lab test result</a></li> --}}

                                        @if ($role->onlyRoles('admin', 'doctor'))
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.add-labtest', ['id' => $consultation->id]) }}">
                                                    Create Lab-Test </a></li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="{{ route('admin.deleteconsultation', ['id' => $consultations[0]->id]) }}">Delete</a>
                                            </li>
                                        @endif
                                        </ul>
                    </div>
                    </td>

                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
