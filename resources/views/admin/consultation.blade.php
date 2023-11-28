@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">All Consultation Details for {{ $consultations[0]->user_name }}</h6>
                    <h6 class="mb-0 text-center">Consultation ID : {{ $consultations[0]->consult_id }} </h6>
                    <hr>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">WEIGHT
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HEIGHT
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BMI</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BLOOD
                                        PRESSURE</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PULSE
                                        RATE</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BLOOD
                                        SUGAR</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        TEMPERATURE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATED ON</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACTION</th>
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
                                                    <h6 class="text-sm">{{ $consultation->weight }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->height }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->bmi }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->blood_pressure }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->pulse_rate }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->blood_sugar }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $consultation->temperature }}</h6>
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
                                                                href="{{ route('admin.user-diagnosis', ['id' => $consultation->id]) }}">View
                                                                Diagnosis</a></li>
                                        @endif
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">create lab test</a></li> --}}
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">lab test result</a></li> --}}

                                        @if ($role->onlyRoles('admin', 'doctor',))
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.add-diagnosis', ['id' => $consultation->id]) }}">
                                                    Create Diagnosis </a></li>
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
