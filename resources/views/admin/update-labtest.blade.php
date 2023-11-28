@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header text-center pt-4">
                <h5>Update Lab Test for {{ $labtest->diagnosis->consultation->user->name }}</h5>
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
                <form role="form" action="{{ route('admin.labtest.update', ['id' => $labtest->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="test_name" class="form-label">Lab Test Name</label>
                        <textarea class="form-control" id="test_name" name="test_name">{{ old('test_name', $labtest->test_name)  }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments</label>
                        <textarea class="form-control" id="comments" name="comments">{{ old('comments', $labtest->comments) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $labtest->status) }}">
                    </div>

                    <div class="mb-3">
                        <label for="handled_by" class="form-label">Handled By</label>
                        <input type="text" class="form-control" id="handled_by" name="handled_by" value="{{ old('handled_by', $labtest->handled_by) }}">
                    </div>

                    <div class="mb-3">
                        <label for="lab_result" class="form-label">Lab Result</label>
                        <input type="file" class="form-control" id="lab_result" name="lab_result">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 mb-2">Update Lab Test</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
