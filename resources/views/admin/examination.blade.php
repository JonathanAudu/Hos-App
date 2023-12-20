@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-0 text-center">All Examination Details for {{ $examinations[0]->user_name }}</h6>
                    {{-- <h6 class="mb-0 text-center">examination ID : {{ $examinations[0]->consult_id }} </h6> --}}
                    <hr>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0" style="min-height: 600px">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        COMMENTS</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATED ON</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examinations as $index => $examination)
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
                                                    <h6 class="text-sm">{{ $examination->weight }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->height }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->bmi }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->blood_pressure }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->pulse_rate }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->blood_sugar }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $examination->temperature }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    @if ($examination->comments)
                                                        <h6 class="text-sm">{{ $examination->comments }}</h6>
                                                    @else
                                                        <h6 class="text-sm">N/A</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">
                                                        {{ \Carbon\Carbon::parse($examination->created_at)->toDateString() }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($role->onlyRoles('admin', 'doctor', 'lab-scientist', 'pharmacy'))
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
                                                                href="{{ route('admin.user-diagnosis', ['id' => $examination->id]) }}">View
                                                                Diagnosis</a></li>
                                        @endif
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">create lab test</a></li> --}}
                                        {{--                                               <li><a class="dropdown-item" --}}
                                        {{--                                                      href="">lab test result</a></li> --}}

                                        @if ($role->onlyRoles('admin', 'doctor'))
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin.add-diagnosis', ['id' => $examination->id]) }}">
                                                    Create Diagnosis </a></li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="{{ route('admin.deleteexamination', ['id' => $examinations[0]->id]) }}">Delete</a>
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
