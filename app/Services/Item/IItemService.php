<?php

namespace App\Services\Item;

interface IItemService
{
    public function store($request);
    public function getWithPaginate();
    public function getOneBySlug($slug);
    public function update($request, $slug);
    public function delete($slug);
}