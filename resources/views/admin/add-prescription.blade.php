@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h4>Prescription created successfully.</h4>
                    </div>
                @endif
                <div class="card-header text-center pt-4">
                    <h5>Add Prescription For {{$drug->name}}</h5>
                    <h5>Patient Name : {{$prescription->user->name}}</h5>
                    <h5>Consult ID : {{$prescription->consult_id}}</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{route('admin.prescription.create')}}" method="POST">
                        @csrf
                        <input type="hidden" name="drug_id" value="{{$drug->id}}">

                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea class="form-control" id="comments" name="comments"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dosage" class="form-label">Dosage</label>
                            <textarea class="form-control" id="dosage" name="dosage" required></textarea>
                            <small class="text-muted">Please enter the drug names and dosage in this format. Example: Paracetamol : 2 morning, 2 afternoon and 2 evening.</small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Save Prescription</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
