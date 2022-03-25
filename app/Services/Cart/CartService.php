<?php

namespace App\Services\Cart;

use App\Repositories\Cart\ICartRepository;
use App\Repositories\CartItemNote\ICartItemNoteRepository;
use App\Repositories\Item\IItemRepository;
use App\Transformer\CartItemNoteTransformer;
use App\Transformer\CartTransformer;
use App\Transformer\ItemTransformer;

class CartService implements ICartService
{
    protected $_cartRepo;
    protected $_cartItemNoteRepo;
    protected $_itemRepo;

    public function __construct(
        ICartRepository $_cartRepo,
        ICartItemNoteRepository $_cartItemNoteRepo,
        IItemRepository $_itemRepo
    )
    {
        $this->_cartRepo = $_cartRepo;
        $this->_cartItemNoteRepo = $_cartItemNoteRepo;
        $this->_itemRepo = $_itemRepo;
    }

    public function getAllByIP($ip)
    {
        $notesResponse = [];

        // get cart one by ip
        $cart = $this->_cartRepo->getOneByIP($ip);

        // get all cart item note one by cart id
        $cartItemNotes = $this->_cartItemNoteRepo->getAllByCartID($cart->id);

        foreach ($cartItemNotes as $note) {
            $item = $this->_itemRepo->getOneByID($note->item_uuid);
            $data = (new CartItemNoteTransformer)->oneTransform($note, (new ItemTransformer)->oneTransform($item));

            array_push($notesResponse, $data);
        }

        return (new CartTransformer)->transform($cart, $notesResponse);
    }
}