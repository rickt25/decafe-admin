<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
      $pendingOrders = Order::with('orderDetails')->where('status', 'Pending')->whereDate('created_at', Carbon::today())->get();
      $finishedOrders = Order::with('orderDetails')->where('status', 'Finish')->whereDate('created_at', Carbon::today())->get();
      $cancelledOrders = Order::with('orderDetails')->where('status', 'Cancel')->whereDate('created_at', Carbon::today())->get();
      return view('pages.order.index', compact('pendingOrders', 'finishedOrders', 'cancelledOrders'));
    }

    public function changeStatus(Request $request){
      $order = Order::find($request->id);
      $order->update([
        'status' => $request->status ?? "Pending"
      ]);
      return redirect()->back()->with('success', 'Status updated successfully');
    }
}
