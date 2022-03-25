<?php

namespace App\Repositories\CartItemNote;

use App\Models\CartItemNote;
use App\Repositories\CartItemNote\ICartItemNoteRepository;

class CartItemNoteRepository implements ICartItemNoteRepository
{
    public function store($request, $item_uuid, $cart_id)
    {
        $cartItemNote = new CartItemNote;

        $cartItemNote->item_uuid = $item_uuid;
        $cartItemNote->quantity = $request->quantity;
        $cartItemNote->notes = $request->notes;
        $cartItemNote->cart_id = $cart_id;

        $cartItemNote->save();

        return $cartItemNote;
    }

    public function getAllByCartID($cart_id)
    {
        return CartItemNote::where('cart_id', $cart_id)->get();
    }

    public function update($request, $id)
    {
        return CartItemNote::where('id', $id)->update($request);
    }

    public function delete($id)
    {
        return CartItemNote::where('id', $id)->delete();
    }
}