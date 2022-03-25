<?php

namespace App\Services\CartItemNote;

interface ICartItemNoteService
{
    public function store($request, $itemUuid);
}