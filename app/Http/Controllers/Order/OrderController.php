<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::all();

        return view('admin.pages.order.index', [
            'orders' => $orders
        ]);
    }


    public function buy($id, Request $req)
    {
        if(!\Auth::guard('client')->check()){
            return redirect(route('web.login', [
                'id' => $id,
                'previous' => url()->previous()
            ]));
        }

        $product = \App\Models\Product::find($id);

        if(!$product){
            return abort('404');
        }

        $createOrder = \App\Models\Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
            'product_id' => $product->id,
            'amount_due' => ($product->price * 1.1),
            'vat' => 10
        ]);

        return redirect(route('web.transaction.detail', [
            'id' => $createOrder->id
        ]));
    }

    public function orderPage($id)
    {
        $order = \App\Models\Order::find($id);

        if(!$order){
            return abort(404);
        }

        if(\Auth::guard('client')->user()->id != $order->client_id){
            return abort(404);
        }


        return view('web.pages.transaction', [
            'transaction' => $order
        ]);
    }

    public function uploadPaymentProof(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'payment_proof' => 'required|image',
            'id' => 'required|exists:order,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)
            ->withInput();
        }

        $file = $req->file('payment_proof');
        $fileName = $req->id.".".$file->getClientOriginalExtension();
        $file->move('img/payment_proof', $fileName);

        $order = \App\Models\Order::find($req->id);
        $order->payment_proof = $fileName;
        $order->save();

        return back();
    }

    public function approvePayment($id)
    {
        $order = \App\Models\Order::find($id);

        if(empty($order)){
            return abort(404);
        }

        $now = \Carbon\Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD');

        $order->date_paid = $now;
        $order->save();

        $client_plan = new \App\Models\ClientPlan;
        $client_plan->client_id = $order->client_id;
        $client_plan->product_id = $order->product_id;
        $client_plan->start_date = $now;
        $client_plan->expiry_date = \Carbon\Carbon::parse($now)->addMonths(12)->isoFormat('YYYY-MM-DD');
        $client_plan->credits = $order->product->credit;
        $client_plan->save();

        return redirect(route('admin.order.index'));

        // $update = \App\Models\Order::find();
    }
}
