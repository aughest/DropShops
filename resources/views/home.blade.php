@extends('layouts.main')

@section('container')

    <h3 class="mt-3 mb-3">Category</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
        {{-- @foreach ($categories as $category)
        <div class="col mb-5">
            <div class="card" style="width: 13rem;">
                <img src="{{ asset('storage/images/'.$category->image) }}" class="card-img-top">
                <div class="card-body">
                    <a href="/products/{{ $category->name }}" class="text-decoration-none">
                        <h5 class="card-title text-dark">{{ $category->name }}</h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach --}}
        @foreach ($categories as $category)
        <div class="col mb-5">
            <div class="shadow-sm bg-body rounded">
                <a href="/products/{{ $category->name }}" class="text-decoration-none">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/images/Category/'.$category->image) }}" class="card-img-bottom" alt="{{ $category->name }}">
                    </div>
                    <h4 class="card-title text-center text-dark p-3" style="">{{ $category->name }}</h4>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <h3 class="mt-3 mb-3">New Product</h3>
    <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-4 row-cols-xl-6">
        @foreach ($products as $product)
        <div class="col mb-5">
            <div class="shadow-sm bg-body rounded">
                <a href="/products/{{ $product->category->name }}/{{ $product->name }}/detail" class="text-decoration-none text-dark">
                    <img src="{{ asset('storage/images/Product/'.$product->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                        <p class="card-title text-dark">Rp{{ number_format($product->price, 0, '.', '.') }}</p>
                        <div class="my-2" style="height: 1px; background-color: rgb(201, 201, 201)"></div>
                        <p style="font-size: 12px; margin-bottom: 3px"><i class="bi bi-bag-check"></i> {{ $product->shop->name }}</p>
                        <p style="font-size: 12px; margin-bottom: 1px"><i class="bi bi-geo-alt"></i> {{ $product->shop->location }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection