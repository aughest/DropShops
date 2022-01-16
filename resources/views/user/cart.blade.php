@extends('layouts.main')

@section('container')
    
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="mb-4">
            <h4 class="text-dark text-center">Cart</h4>
        </div>
        @if (count($carts) > 0)
        @foreach ($carts as $cart)
        <div class="row mb-3">
            <div class="col">
                <img src="{{asset('storage/images/Product/'.$cart->products[0]->image)}}" alt="" style="width: 400px">
            </div>
            <div class="col">
                <h4>{{ $cart->products[0]->name }}</h4>
                <p>Rp.{{ $cart->subtotal }}</p>
                <form action="/updateCart" method="POST">
                    @csrf
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="inputQuantity" name="quantity" value="{{ $cart->quantity }}" min="0">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn mt-2 text-light" style="background-color: #00A19D">Update</button>
                </form>
                <form action="/deleteCart/{{ $cart->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn bg-danger"><i class="bi bi-trash text-light"></i></button>
                </form>
            </div>
        </div>
        @endforeach
        {{-- <form action="/checkout" method="POST"> --}}
            {{-- <input type="hidden" name="quantity" value="{{ $cart->id }}"> --}}
            <div class="d-flex justify-content-center mt-4">
                <a href="/cart/checkout" class="btn text-light" style="background-color: #00A19D">Order</a>
            </div>
        {{-- </form> --}}
        @else
            <p>Cart is empty..</p>
        @endif
    </div>
</div>

@endsection