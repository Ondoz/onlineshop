<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('shop.checkout');
    }

    public function store(Request $request)
    {
        $code = self::orderCrete();
        $data = [
            'code' => $code,
            'total_qty' => $request->total_qty,
            'total_price' => $request->total_price,
        ];
        $arr = [];
        foreach ($request->name as $key => $value) {
            $arr['name'][] = $value;
            $arr['qty'][] = $request->qty[$key];
            $arr['price'][] = $request->price[$key];
        }


        return response()->json([$data, $arr]);
    }

    protected static function orderCrete()
    {
        $Order = Order::whereDate('created_at', '=', date('Ymd'))->get();
        $numb = $Order->count() + 1;
        return 'INV/' . date('Ymd') . '/KKT/R/' . $numb;
    }
}
