@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header text-center pt-4">
                <h5>Add Lab Test For {{$diagnosis->consultation->user->name}}</h5>
            </div>
            @if (session('error'))
            <div class="alert alert-danger text-center">
                <h4>Lab Result already created for this user Diagnosis</h4>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success text-center">
                <h4>Lab Result Created</h4>
            </div>
            @endif
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
                <form role="form" action="{{ route('admin.labtest.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">

                    <div class="mb-3">
                        <label for="test_name" class="form-label">Lab Test Name</label>
                        <input type="text" class="form-control" id="test_name" name="test_name" value="{{ old('test_name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <textarea class="form-control" id="comments" name="comments">{{ old('comments') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}">
                    </div>

                    <div class="mb-3">
                        <label for="lab_result" class="form-label">Lab Result</label>
                        <input type="file" class="form-control" id="lab_result" name="lab_result">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 mb-2">Save Lab Test</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
