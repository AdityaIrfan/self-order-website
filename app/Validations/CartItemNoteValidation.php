<?php

namespace App\Validations;

use App\Utils\Messages\ValidateMessage;

class CartItemNoteValidation
{
    public function store($itemUuid, $ip): void
    {
        $request = (object)array(
            'item_uuid' => $itemUuid,
            'ip' => $ip
        );

        $messages = [
            'item_uuid.required' => ValidateMessage::ITEMUUIDREQUIRED,
            'ip.required' => ValidateMessage::IPREQUIRED,
        ];

        // return $response = (array) {}
    }
}