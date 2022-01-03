@extends('layouts.main')

@section('container')
    
<div>
    <h3 class="text-center">Transaction History</h3>

    <div class="row "></div>
    @if (count($transactions) > 0)
        @foreach ($transactions as $transaction)
            <div class="col d-flex justify-content-center my-3">
                {{-- <a class="btn px-5 text-white" href="/transaction-detail/{{ $transaction->id }}"  style="background-color: #00A19D">
                    Transaction at {{ $transaction->created_at }}
                </a> --}}
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                      <h5 class="card-title">Dropship</h5>
                      <p class="card-text">{{ date('d M Y H:i', strtotime($transaction->created_at)); }} WIB</p>
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