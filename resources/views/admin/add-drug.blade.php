@inject('role', 'App\Http\Helpers\AuthHelper')

@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>Drugs For {{$drug->user->name}}</h5>
                    <h5>Consult ID : {{$drug->consult_id}}</h5>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        <h4>Drug Record already created for this user's lab test</h4>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h4>Drug created successfully.</h4>
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
                    <form role="form" action="{{route('admin.drug.create')}}" method="POST">
                        @csrf
                        <input type="hidden" name="labtest_id" value="{{$labtest->id}}">

                        <div class="mb-3">
                            <label for="name" class="form-label">NAME OF DRUG(S)</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Save Drug</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
