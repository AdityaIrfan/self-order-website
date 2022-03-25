<?php

namespace App\Validations;

use App\Utils\Messages\ValidateMessage;

class ItemValidation
{
    public function storeItem($request): void
    {
        $messages = [
            'item_uuid.required' => ValidateMessage::IMAGEREQUIRED,
            'name.required' => ValidateMessage::NAMEREQUIRED,
            'price.required' => ValidateMessage::PRICEREQUIRED
        ];

        $request->validate(
            [
                'image'     => 'required',
                'name'      => 'required',
                'price'     => 'required'    
            ],
            $messages
        );
    }
}