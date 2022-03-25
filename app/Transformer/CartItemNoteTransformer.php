<?php

namespace App\Transformer;


class CartItemNoteTransformer
{
    public function oneTransform($cartItemNote, $item)
    {
        return [
            'item' => $item,
            'quantity' => $cartItemNote->quantity,
            'notes' => $cartItemNote->notes,
            'total_price' => $item['price'] * $cartItemNote->quantity
        ];
    }
}