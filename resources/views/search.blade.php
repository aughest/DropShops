@extends('layouts.main')

@section('container')

    <h3 class="mt-3 mb-3">Products</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
        @if (count($products) > 0)
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card">
                    <a href="/products/{{ $product->category->name }}/{{ $product->name }}/detail" class="text-decoration-none text-dark">
                        <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $product->name }}</h5>
                            <p>Rp.{{ $product->price }}</p>
                        </div>
                    </a>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                    <div class="card-body d-flex justify-content-between">
                        <a href="/admin/update-product/{{ $product->id }}" class="btn text-light" style="background-color: #00A19D">Update</a>
                        <form action="/admin/product/{{ $product->id }}/delete" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn text-light" style="background-color: #00A19D">Delete</button>
                        </form>     
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        @else
            <p>No Product..</p>
        @endif
    </div>
@endsection