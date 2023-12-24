@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>Add Consultation/Diagnosis For {{ $user->name }}</h5>
                </div>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <strong>Whoops!</strong> There were some problems with your input:<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form role="form" action="{{ route('admin.createconsultation') }}" method="POST">
                        @csrf
                        <input type="hidden" name="examination_id" value="{{ $examination->id }}">

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnosis:</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="provisional_diagnosis" class="form-label">Underlying Diagnosis:</label>
                            <textarea class="form-control" name="provisional_diagnosis" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="comments" class="form-label">Comments:</label>
                            <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save Consultation/Diagnosis</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
