@extends('admin.dashboard')

@section('pages')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header text-center pt-4">
                    <h5>Enter Payment Details</h5>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        <h4>Payment made already</h4>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h4>Payment successful</h4>
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
                    <form role="form" action="{{route('user.payment.store')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="user_id" value="{{$consultation->user_id}}">
                        <input type="hidden" name="consultation_id" value="{{$consultation->id}}">

                        <div class="mb-3">
                            <label for="payment" class="form-label">Payment:</label>
                            <select name="payment" id="payment" class="form-control">
                                @foreach($paymentList as $option)
                                    <option value="{{ $option->payment_desc }}" data-fee="{{ $option->payment_fee }}">
                                        {{ $option->payment_desc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fee" class="form-label">Fee (₦):</label>
                            <input type="text" id="fee" name="fee" class="form-control" readonly>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4 mb-2">Submit Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const paymentDropdown = document.getElementById('payment');
        const feeInput = document.getElementById('fee');

        paymentDropdown.addEventListener('change', function() {
            const selectedPayment = paymentDropdown.options[paymentDropdown.selectedIndex];
            feeInput.value = selectedPayment.getAttribute('data-fee');
        });
    </script>
@endsection
