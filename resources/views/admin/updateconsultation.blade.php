@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header text-center pt-4">
                    <h5>Select Consultation Doctor For {{ $consultation->user->name }}</h5>
                    <h6>Created On: {{ \Carbon\Carbon::parse($consultation->created_at)->toDateString() }}</h6>
                </div>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input:<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            Consultation Updated
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form role="form" action="{{ route('admin.updateconsultation', $consultation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $consultation->id }}">

                        <div class="mb-3">
                            <label for="assigned_doctor" class="form-label">Select Doctor</label>
                            <select class="form-select" id="assigned_doctor" name="assigned_doctor" required>
                                <option value="" selected disabled hidden>Select Doctor</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Assign Doctor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
