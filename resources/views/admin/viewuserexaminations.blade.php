@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>EXAMINATIONS </h6>
                </div>
                @if (session('updated'))
                    <div class="alert alert-success text-center">
                        <h4>Doctor assigned</h4>
                    </div>
                @endif
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0" style="min-height: 600px">
                        <table class="table align-items-center mb-0">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAME OF
                                        DOCTOR</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATED ON</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serialNumber = 1;
                                @endphp
                                @forelse ($examinations as $examination)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-3">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm">{{ $serialNumber++ }}</h6>
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
                                                    <h6 class="text-sm">{{ $examination->assigned_doctor }}</h6>
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
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="menu-{{ $examination->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="menu-{{ $examination->id }}">
                                                    {{-- @if ($role->onlyRoles('admin', 'doctor'))
                                                    <li>
                                                        <a class="dropdown-item font-weight-bolder"
                                                            href="{{ route('user.payments', ['id' => $examination->id]) }}"><button
                                                                type="button" class="btn btn-success"
                                                                style="width: 100%; margin-bottom: 0px;">
                                                                MAKE PAYMENT
                                                            </button>
                                                        </a>
                                                    </li>
                                                    @endif --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.showdiagnosis', ['examination_id' => $examination->id]) }}">
                                                        <button type="button" class="btn btn-primary"
                                                            style="width: 100%; margin-bottom: 0px;">
                                                            View Consultation/Diagnosis
                                                        </button>
                                                    </a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
