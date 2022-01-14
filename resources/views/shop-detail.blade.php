@extends('layouts.main')

@section('container')

  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="row">
      <div class="col-sm-2 col-md-2">
          <img src="{{asset('storage/images/Shop/'.$products[0]->shop->image)}}" class="img-fluid rounded-circle" width="100px">
      </div>
      <div class="col m-auto border-end" style="color: black">
          <h4 style="margin-bottom: 10px"><i class="bi bi-bag-check"></i> {{ $products[0]->shop->name }}</h4>
          <p style="font-size: 16px; margin-bottom: 0"><i class="bi bi-geo-alt"></i> {{ $products[0]->shop->location }}</p>
      </div>
      <div class="col m-auto" style="color: black">
          <p style="font-size: 14px; margin-bottom: 3px">{{ $products[0]->shop->description }}</p>
      </div>
    </div>
  </div>

  <h4 class="mt-3 mb-3">All Products</h4>
  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-6">
      @if (count($products) > 0)
          @foreach ($products as $product)
          <div class="col mb-5">
              <div class="shadow-sm bg-body rounded">
                  <a href="/products/{{ $product->category->name }}/{{ $product->name }}/detail" class="text-decoration-none text-dark">
                      <img src="{{ asset('storage/images/Product/'.$product->image) }}" class="card-img-top">
                      <div class="card-body">
                          <p class="card-title text-dark">{{ $product->name }}</p>
                          <h5>Rp.{{ $product->price }}</h5>                               
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