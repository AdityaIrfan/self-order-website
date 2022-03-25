<?php

namespace App\Services\Item;

use App\Repositories\Item\ItemRepository;
use App\Transformer\ItemTransformer;

class ItemService implements IItemService
{
    protected $_itemRepo;

    public function __construct(
        ItemRepository $_itemRepo
    )
    {
        $this->_itemRepo = $_itemRepo;
    }

    public function store($request)
    {
        return $this->_itemRepo->store($request);
    }

    public function getWithPaginate()
    {
        return (new ItemTransformer)->trasformWithPaginate($this->_itemRepo->getWithPaginate());
    }

    public function getOneBySlug($slug)
    {

    }

    public function update($request, $slug)
    {

    }

    public function delete($slug)
    {

    }
}