<?php

namespace App\Repositories\Cart;

use App\Helpers\UuidHelper;
use App\Models\Cart;

class CartRepository implements ICartRepository
{
    public function store($request)
    {
        $cart = new Cart;

        $cart->ip = $request->ip();

        $cart->save();

        return $cart;
    }

    public function getAll()
    {

    }

    public function getOneByIP($ip)
    {
        return Cart::where('ip', $ip)->where('deleted_at', null)->first();
    }

    public function update($request, $id)
    {
        /* $cart->consume_method = $request->consume_method;
        $cart->table = $request->consume_method;
        $cart->name = $request->name;
        $cart->payment_method = $request->payment_methpd;
        $cart->tax = $request->tax;
        $cart->price = $request->price;
        $cart->total_price = $request->total_price; */

        return Cart::where('id', $id)->update($request);
    }

    public function delete($id)
    {
        return Cart::where('id', $id)->delete();
    }
}