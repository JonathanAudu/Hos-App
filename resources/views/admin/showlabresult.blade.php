@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0 text-center">Test Result for {{ $lab->consultation->user->name }}</h5>
                    <h5 class="mb-0 text-center">Consultation Number: {{ $lab->consultation->consult_id }}</h5>
                    <hr>
                </div>

                <div class="card-body p-0">
                    @if ($labtest)
                        <div class="table-responsive" style="min-height: 600px">
                            <table class="table table-bordered align-middle mb-3 mx-sm-auto my-3">
                                <tbody>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder"><h6>Lab Test Name</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$labtest->test_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder"><h6>Comments</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$labtest->comments}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder"><h6>Status</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{$labtest->status}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder "><h6>DATE</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm">{{ \Carbon\Carbon::parse($labtest->created_at)->toDateString() }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder "><h6>Lab Result File</h6></th>
                                    <td>
                                        <div class="d-flex px-3 py-3">
                                            <div class="d-flex flex-column justify-content-center">
                                                @if ($labtest->lab_result)
                                                    <a href="{{ route('user.resultdownload', ['id' => $labtest->id]) }}" class="btn btn-success btn-sm">Download</a>
                                                @else
                                                    No File
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div >
                                <a class="d-grid gap-2 d-md-flex justify-content-md-center" href="{{ route('user.showprescdrug', ['id'=> $labtest->id])}}" >
                                    <button type="button" class="btn btn-primary" style="width: 30%;">
                                        CHECK  FOR DRUGS & PRESCRIPTIONS
                                    </button>
                                </a>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-danger text-white text-center">
                            <h5>NO LAB RESULT YET</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
