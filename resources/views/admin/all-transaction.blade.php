@extends('layouts.main')

@section('container')

  <h3 class="text-center mb-4">All Transaction</h3>

  <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-2">
    @if (count($transactions) > 0)
      @foreach ($transactions as $transaction)
        <div class="col mb-3">
          {{-- <a class="btn px-5 text-white" href="/transaction-detail/{{ $transaction->id }}"  style="background-color: #00A19D">
              Transaction at {{ $transaction->created_at }}
          </a> --}}
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Dropship</h5>
              <p class="card-text">{{ date('d M Y H:i', strtotime($transaction->created_at)); }} WIB</p>
              <p class="card-text">Buyer: {{ $transaction->user->username }}</p>
              <p class="card-text">Recepient: {{ $transaction->namerecepient }}</p>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="/transaction-detail/{{ $transaction->id }}" class="btn text-white" style="background-color: #00A19D">Detail Transaction</a>
              </div>
            </div>
          </div>
        </div> 
      @endforeach
    @else
        <p class="p-4">Transaction is empty..</p>
    @endif
  </div>

@endsection