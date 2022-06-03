<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function viewTransaction(){
        $transactions = Order::with('orderDetails')->get();

        return response()->json($transactions);
    }

    public function addTransaction(Request $request){
        $orders = json_decode($request->orders);

        if(!$orders){
            return response()->json(['message' => 'No order found'], 400);
        }

        $transaction = Order::create([
          'is_dine_in' => $request->is_dine_in,
        ]);

        foreach($orders as $newOrder){
          OrderDetail::create([
            'order_id' => $transaction->id,
            'menu_id' => $newOrder['menu_id'],
            'qty' => $newOrder['qty'],
            'notes' => $newOrder['notes']
          ]);
        }

        return response()->json([
          'message' => 'Berhasil memesan menu!'
        ], 200);
    }
}
