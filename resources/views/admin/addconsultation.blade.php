@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header text-center pt-4">
                <h5>Add Consultation For {{$user->name}}</h5>
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
                    <input type="hidden" name="user_id" value="{{$user->id}}">

                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="text" class="form-control" id="weight" name="weight" >
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="text" class="form-control" id="height" name="height" >
                    </div>

                    <div class="mb-3">
                        <label for="bmi" class="form-label">BMI</label>
                        <input type="text" class="form-control" id="bmi" name="bmi" >
                    </div>

                    <div class="mb-3">
                        <label for="blood_pressure" class="form-label">Blood Pressure</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure">
                    </div>

                    <div class="mb-3">
                        <label for="pulse_rate" class="form-label">Pulse Rate</label>
                        <input type="text" class="form-control" id="pulse_rate" name="pulse_rate" >
                    </div>

                    <div class="mb-3">
                        <label for="blood_sugar" class="form-label">Blood Sugar</label>
                        <input type="text" class="form-control" id="blood_sugar" name="blood_sugar" >
                    </div>

                    <div class="mb-3">
                        <label for="temperature" class="form-label">Temperature</label>
                        <input type="text" class="form-control" id="temperature" name="temperature" >
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 mb-2">Save Consultation</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
