<?php

namespace App\Repositories\Item;

interface IItemRepository 
{
    public function store($request);
    public function getWithPaginate();
    public function getOneBySlug($slug);
    public function getOneByID($id);
    public function update($request, $slug);
    public function delete($slug);
}