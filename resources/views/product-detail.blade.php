@extends('layouts.main')

@section('container')
    <div class="my-3 p-1">
        <h4 class="text-dark text-center">Detail Product</h4>
    </div>
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-5">
            <img src="{{asset('storage/images/Product/'.$product[0]->image)}}" class="card-img-top mb-5 mb-md-0">
        </div>
        <div class="col-md-7">
            <p class="mb-2" style="font-size: 22px; font-weight: 500; color: rgb(44, 44, 44)">{{ $product[0]->name }}</p>
            <p style="font-size: 24px; font-weight: 700;">Rp{{ number_format($product[0]->price, 0, '.', '.') }}</p>
            <p>{{ $product[0]->description }}</p>
            @if (Auth::guest() || Auth::user()->role == 'user')
            <div class="row mb-3">
                <form action="/addCart" method="POST">
                    <div class="col">  
                        @csrf
                        <input type="hidden" name="id" value="{{ $product[0]->id }}">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn text-light" style="background-color: #00A19D">Buy</button>
                    </div>
                </form>
            </div>
            <div class="row mb-3">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
            </div>
            @endif
            <div class="my-2" style="height: 1px; background-color: rgb(201, 201, 201)"></div>
            <a href="/shop/{{ $product[0]->shop->name }}" class="row" style="text-decoration: none">
                <div class="row">
                    <div class="col-sm-2 col-md-2">
                        <img src="{{asset('storage/images/Shop/'.$product[0]->shop->image)}}" class="img-fluid rounded-circle" width="75px">
                    </div>
                    <div class="col m-auto" style="color: black">
                        <p style="font-size: 14px; margin-bottom: 3px"><i class="bi bi-bag-check"></i> {{ $product[0]->shop->name }}</p>
                        <p style="font-size: 14px; margin-bottom: 1px"><i class="bi bi-geo-alt"></i> {{ $product[0]->shop->location }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>


@endsection