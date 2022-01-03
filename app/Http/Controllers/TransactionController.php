<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $transactions = Transaction::all();

            return view('admin.all-transaction',[
                'transactions' => $transactions
            ]);
        }else{
            $transactions = Transaction::latest()->where('user_id','=',Auth::id())->get();
    
            return view('user.transactions-history',[
                'transactions' => $transactions
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'recepientName' => 'required',
            'recepientPhoneNumber' => 'required',
            'recepientAddress' => 'required',
            'paymentMethod' => 'required'
        ]);

        $user = Auth::id();
        $carts = Cart::where('user_id','=', $user)->get();
        
        $transaction = new Transaction();
        $transaction->user_id = $user;
        $transaction->payment_type = $request->paymentMethod;
        $transaction->namerecepient = $request->recepientName;
        $transaction->numberphonerecepient = $request->recepientPhoneNumber;
        $transaction->addressrecepient = $request->recepientAddress;
        $transaction->date = new DateTime();
        $transaction->save();
        foreach($carts as $cart){
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $cart->product_id;
            $transactionDetail->subtotal = $cart->subtotal;
            $transactionDetail->quantity = $cart->quantity;
            $transactionDetail->save();
            $cart->delete();
        }

        return redirect('/transaction-history');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        $total = 0;
        foreach($transaction->transactionDetails as $transaction_detail){
            $total += $transaction_detail->subtotal;
        }
        
        return view('user.transaction-detail',[
            'transaction' => $transaction,
            'total' => $total
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
