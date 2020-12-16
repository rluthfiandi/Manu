<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\Cart;
use App\Order;
use App\User;

class TransactionController extends Controller
{

     public function create()
    {
        return view('transaction.create');
    }
 
    /*public function store()
    {
        Transaction::create([
            'user_id' => request('user_id'),
            'nama' => request('nama'),
            'no_hp' => request('no_hp'),
            'no_meja' => request('no_meja'),
            'amount'=> request('amount')
        ]);
 
        return redirect()->back();
    } */

    public function storeJson(Request $request)
    {
        $transaction = new transaction;

        $transaction->user_id = $request->input('user_id');
        $transaction->nama = $request->input('nama');
        $transaction->no_hp = $request->input('no_hp');
        $transaction->no_meja = $request->input('no_meja');
        $transaction->amount = $request->input('amount');

        $transaction->save();

        if($transaction->save()){
            return response()->json('Pesanan sedang diproses, mohon menunggu', 201);
        }

        else{
            return response()->json('Failed', 400);
        }
    }

    public function storeJsonGet()
    {
        return Transaction::all();
    } 

    
}
