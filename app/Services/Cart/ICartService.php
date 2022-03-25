<?php

namespace App\Services\Cart;

interface ICartService
{
    public function getAllByIP($ip);
}