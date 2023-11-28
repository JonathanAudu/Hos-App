@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0 text-center">Drugs & Prescriptions for {{ $drugUser->user->name }}</h5>
                    <h5 class="mb-0 text-center">Consultation Number: {{ $drugUser->consult_id }}</h5>
                    <hr>
                </div>

                <div class="card-body p-0">
                    @if ($drug && $prescription)
                        <div class="table-responsive" style="min-height: 600px">
                            <table class="table table-bordered align-middle mb-3 mx-sm-auto my-3">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder  text-center">DRUG NAME(s)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">PRESCRIPTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center" ><h6>{{$drug->name}}</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                    <p class="text-uppercase text-secondary text-xxs font-weight-bolder text-center" ><h6>{{$prescription->dosage}}</h6></p>                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-secondary text-xxs text-center"><h6>Prescribed by</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">{{$prescription->handled_by}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    @else
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO DRUGS/PRESCRIPTIONS YET</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
