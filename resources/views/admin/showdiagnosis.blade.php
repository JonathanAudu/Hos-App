@inject('role', 'App\Http\Helpers\AuthHelper')
@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0 text-center">Diagnosis Details for {{ $consultation->user->name }}</h5>
                    <h5 class="mb-0 text-center">Consultation Number: {{ $consultation->consult_id }}</h5>
                    <hr>
                </div>

                <div class="card-body p-0">
                    @if ($consultation->diagnosis)
                        <div class="table-responsive" style="min-height: 600px">
                            <table class="table table-bordered align-middle mb-3 mx-sm-auto my-3">
                                <tbody>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder"><h6>Examination</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{ $diagnosis->examination }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder "><h6>Lab Test Message</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{ $diagnosis->provisional_diagnosis }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div >
                                <a class="d-grid gap-2 d-md-flex justify-content-md-center" href="{{ route('user.showlabresult', ['id' => $diagnosis->id]) }}" >
                                    <button type="button" class="btn btn-primary" style="width: 30%;">
                                        CHECK  LAB  RESULT
                                    </button>
                                </a>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO DIAGNOSIS FOR THIS CONSULTATION</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection