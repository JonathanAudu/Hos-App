@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>UPDATE DRUG(s)</h5>
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
                    <form role="form" action="{{route('admin.drug.update', ['id' => $drug->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">NAME OF DRUG(S)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $drug->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">COMMENTS</label>
                            <input type="text" class="form-control" id="comments" name="comments" value="{{ old('comments', $drug->comments) }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update Drug </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
