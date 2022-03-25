<?php

namespace App\Repositories\Cart;

interface ICartRepository
{
    public function store($request);
    public function getAll();
    public function getOneByIP($ip);
    public function update($request, $id);
    public function delete($id);
}