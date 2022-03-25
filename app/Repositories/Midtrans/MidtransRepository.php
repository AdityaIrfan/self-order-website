<?php

namespace App\Repositories\Midtrans;

class MidtransRepository implements IMidtransRepository
{

    protected function setConfig() {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds'); 
    }

    public function pay($request)
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
            ),
            "item_details" => [
                array(
                  "id" => "a01",
                  "price" => 7000,
                  "quantity" => 1,
                  "name" => "Apple"
                ),
                array(
                  "id" => "b02",
                  "price" => 3000,
                  "quantity" => 2,
                  "name" => "Orange"
                )
              ],
            'customer_details' => array(
                'first_name' => 'aditya',
            ),
        );
    }
}