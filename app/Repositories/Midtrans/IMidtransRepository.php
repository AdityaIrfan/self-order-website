<?php

namespace App\Repositories\Midtrans;

interface IMidtransRepository
{
    public function pay($request);
}