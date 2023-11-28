@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Update Diagnosis for {{ $diagnosis->consultation->user->name }}</h4>
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            <h5>Updated successfully</h5>
                        </div>
                    @endif
                </div>
                <div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.diagnosis.update', $diagnosis->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="examination" class="form-label">Examination:</label>
                            <textarea class="form-control" id="examination" name="examination" rows="4">{{ $diagnosis->examination }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="examination" class="form-label">Lab Test Message:</label>
                            <textarea class="form-control" id=""  name="provisional_diagnosis" rows="4">{{  $diagnosis->provisional_diagnosis }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Diagnosis</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
