<?php

namespace App\Repositories\CartItemNote;

interface ICartItemNoteRepository
{
    public function store($request, $item_uuid, $cart_id);
    public function getAllByCartID($cart_id);
    public function update($request, $id);
    public function delete($uuid);
}