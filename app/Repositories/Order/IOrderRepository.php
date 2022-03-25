<?php

namespace App\Repositories\Order;

interface IOrderRepository
{
    public function store($request);
    public function getAll();
    public function getOneByUUID($uuid);
    public function update($request, $uuid);
    public function delete($uuid);
}