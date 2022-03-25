<?php

namespace App\Transformer;


class CartTransformer
{
    public function transform($cart, $cartItemNotes)
    {
        $price = 0;

        foreach ($cartItemNotes as $note) {
            $price += $note['total_price'];
        }

        return [
            'items' => $cartItemNotes,
            'consume_method' => $cart->consume_method,
            'table' => $cart->table,
            'name' => $cart->name,
            'payment_method' => $cart->payment_method,
            'tax' => $cart->tax,
            'price' => $price,
            'total_price' => $price + $price / 10,
            'status' => $cart->status
        ];
    }

    public function midtransTrasform($cart)
    {
        $item_details = [];

        foreach ($cart['items'] as $item) {
            $item = array(
                "id" => $item['item']['slug'],
                "price" => $item['item']['price'],
                "quantity" => $item['quantity'],
                "name" => $item['item']['name'],
            );

            array_push($item_details, $item);
        }

        $customer_details = array(
            "fist_name" => $cart['name']
        );

        return [
            "item_details" => $item_details,
            "customer_detail" => $customer_details
        ];
    }
}