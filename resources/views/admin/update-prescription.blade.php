@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">

                <div class="card-header text-center pt-4">
                    <h5>Edit Prescription For {{$prescription->drug->name}}</h5>
                    <h5>Patient Name: {{$prescribedUser->user->name}}</h5>
                    <h5>Consult ID: {{$prescribedUser->consult_id}}</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.prescription.update', ['id' => $prescription->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="drug_id" value="{{ $prescription->drug->id }}">

                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea class="form-control" id="comments" name="comments">{{ $prescription->comments }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dosage" class="form-label">Dosage</label>
                            <textarea class="form-control" id="dosage" name="dosage" required>{{ $prescription->dosage }}</textarea>
                            <small class="text-muted">Please enter the drug names and dosage in this format. Example: Paracetamol : 2 morning, 2 afternoon, and 2 evening.</small>
                        </div>

                        <div class="mb-3">
                            <label for="handled_by" class="form-label">Handled By</label>
                            <input type="text" class="form-control" id="handled_by" name="handled_by" value="{{ $prescription->handled_by }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update Prescription</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
