@extends('layouts.main')

@section('container')
    
  <h1 class="text-center my-5">Transaction Detail</h1>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <p>Status <strong>Success</strong></p>
      <p>Transaction date <strong>{{ date('d M Y H:i', strtotime($transaction->created_at)); }} WIB</strong> </p>

      <h4 class="mt-3">Recepient</h4>
      <div class="my-2 mb-3" style="height: 1px; background-color: rgb(201, 201, 201)"></div>
      <div class="row">
        <div class="col-sm-1 col-md-2">
          <p>Name</p>
        </div>
        <div class="col-sm-1 col-md-1 text-end">
          <p>:</p>
        </div>
        <div class="col-sm-12 col-md-9">
          <p>{{ $transaction->namerecepient }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <p>Phone Number</p>
        </div>
        <div class="col-md-1 text-end">
          <p>:</p>
        </div>
        <div class="col-md-9">
          <p>{{ $transaction->numberphonerecepient }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <p>Address</p>
        </div>
        <div class="col-md-1 text-end">
          <p>:</p>
        </div>
        <div class="col-md-9">
          <p>{{ $transaction->addressrecepient }}</p>
        </div>
      </div>

      <h4 class="mt-3">Payment</h4>
      <div class="my-2 mb-3" style="height: 1px; background-color: rgb(201, 201, 201)"></div>
      <p>Payment Method: {{ $transaction->payment_type }}</p>

      <h4 class="mt-3">Detail Product</h4>
      <div class="my-2 mb-3" style="height: 1px; background-color: rgb(201, 201, 201)"></div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        @foreach ($transaction->transactionDetails as $transaction_detail)
            <tbody>
              <tr>
                <th><img src="{{asset('storage/images/Product/'.$transaction_detail->product->image)}}" style="width: 200px"></th>
                <td>{{ $transaction_detail->product->name }}</td>
                <td>Rp{{ $transaction_detail->subtotal }}</td>
                <td>{{ $transaction_detail->quantity }}</td>
              </tr>
            </tbody>
        @endforeach    
      </table>
      <p class="text-end">Total Price : <strong>Rp{{ $total }}</strong></p>
    </div>
  </div>

@endsection