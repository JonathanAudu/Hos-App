@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>Update Payment Status</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{route('admin.paymentstatus.update', ['id'=>$payment->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="payment" class="form-label">Payment for:</label>
                            <input type="text" id="payment" name="payment" class="form-control" value="{{ $payment->payment }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="fee" class="form-label">Fee (₦):</label>
                            <input type="text" id="fee" name="fee" class="form-control" value="{{ $payment->fee }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Payment:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $payment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $payment->status === 'paid' ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Update Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
