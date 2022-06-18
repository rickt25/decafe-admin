<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(){
      $transactions = Order::with('orderDetails')->where('status', 'Finish')->get();
      return view('pages.transaction.index', compact('transactions'));
    }
}
