<?php

namespace App\Services\CartItemNote;

use App\Repositories\Cart\ICartRepository;
use App\Repositories\CartItemNote\ICartItemNoteRepository;

class CartItemNoteService implements ICartItemNoteService
{
    protected $_cartItemNoteRepo;
    protected $_cartRepo;

    public function __construct(
        ICartItemNoteRepository $_cartItemNoteRepo,
        ICartRepository $_cartRepo
    )
    {
        $this->_cartItemNoteRepo = $_cartItemNoteRepo;
        $this->_cartRepo = $_cartRepo;
    }

    public function store($request, $itemUuid)
    {
        $cart = $this->_cartRepo->getOneByIP($request->ip());

        if (!$cart) {
            $newCart = $this->_cartRepo->store($request);

            $this->_cartItemNoteRepo->store($request, $itemUuid, $newCart['id']);
        } else {

            $this->_cartItemNoteRepo->store($request, $itemUuid, $cart['id']);
        }
    }
}