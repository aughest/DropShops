@extends('layouts.main')

@section('container')

<div class="row justify-content-center my-5">
    <div class="col-lg-8 col-md-7 col-sm-9">
        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">Checkout</h1>
            <form action="/buying" method="post">
                @csrf
                <h4>Shipping</h4>
                <div class="bg-dark my-2" style="height: 1px"></div>
                <h5>Recepient</h5>

                <div class="row gx-5 mb-2">
                    <div class="col">
                        <label for="recepientName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('recepientName') is-invalid @enderror" id="recepientName" name="recepientName" value="{{ old('recepientName') }}" placeholder="budiawan">
                        @error('recepientName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="recepientPhoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('recepientPhoneNumber') is-invalid @enderror" id="recepientPhoneNumber" name="recepientPhoneNumber" value="{{ old('recepientPhoneNumber') }}" placeholder="08123456789">
                        @error('recepientPhoneNumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label for="recepientAddress" class="form-label">Address</label>
                    <textarea class="form-control @error('recepientAddress') is-invalid @enderror" id="recepientAddress" rows="3" name="recepientAddress">{{ old('recepientAddress') }}</textarea>
                    @error('recepientAddress')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h4 class="mt-5">Product</h4>
                <div class="bg-dark my-2" style="height: 1px"></div>

                @foreach ($carts as $cart)
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-md-6">
                            <img src="{{asset('storage/images/Product/'.$cart->products[0]->image)}}" class="card-img-top mb-5 mb-md-0">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $cart->products[0]->name }}</h4>
                            <p>{{ $cart->quantity }} item(s)</p>
                            <p>Rp.{{ $cart->subtotal }}</p>
                        </div>
                    </div>
                    <div class="my-2" style="height: 1px; background-color: rgb(189, 189, 189)"></div>
                @endforeach
                <p class="text-end">Total Price : <strong>$ {{ $total }}</strong></p>

                <h4 class="mt-5">Payment</h4>
                <div class="bg-dark my-2" style="height: 1px"></div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select @error('paymentMethod') is-invalid @enderror" name="paymentMethod">
                            <option selected value="">Choose Payment Method</option>
                            <option value="Virtual Account">Virtual Account</option>
                            <option value="E-Wallet">E-Wallet</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                        @error('paymentMethod')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="w-100 btn btn-lg mt-3 text-light" style="background-color: #00A19D" type="submit">Buy</button>
            </form>
        </main>
    </div>
</div>



@endsection