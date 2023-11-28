@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Add Diagnosis</h4>
                    <hr>
                </div>
                <div>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h5>Diagnosis added for {{ $consultation->user->name }}</h5>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            <h4>Diagnosis already created for this user consultation</h4>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.creatediagnosis') }}" method="POST">
                        @csrf
                        <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
                        <div class="mb-3">
                            <label for="examination" class="form-label">Examination:</label>
                            <textarea class="form-control" id="examination" name="examination" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="other_provisional_diagnosis" class="form-label">Lab Test Message:</label>
                            <textarea class="form-control" id="provisional_diagnosis" name="provisional_diagnosis" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit Diagnosis</button>
                        </div>
                    </form>
                </div>
            @endsection
