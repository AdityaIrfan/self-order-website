<?php

namespace App\Repositories\Cashless;

use App\Models\Cashless;

class CashlessRepository implements ICashlessRepository
{
    public function store($request)
    {
        $cashless = new Cashless;

        $cashless->name = $request->name;
        $cashless->payment_method = $request->payment_method;

        $cashless->save();

        $cashless->order_id = preg_replace('/\s+/', '', $request->name) . '-' . $cashless->id;

        $cashless->update();

        return $cashless;
    }
}