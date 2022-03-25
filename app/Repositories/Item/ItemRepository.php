<?php

namespace App\Repositories\Item;

use App\Constants\PaginatorConst;
use App\Models\Item;
use Illuminate\Support\Str;

class ItemRepository implements IItemRepository 
{
    public function store($request) 
    {
        $item = new Item;

        $item->image = $request->image;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->status = 'sold out';

        $item->save();

        $item->slug = preg_replace('/\s+/', '-', $request->name) .  "-" . $item->id;

        $item->update();

        return $item;
    }

    public function getWithPaginate()
    {
        return Item::paginate(2);
    }

    public function getOneBySlug($slug)
    {
        return Item::where('slug', $slug)->first();
    }

    public function getOneByID($id)
    {
        return Item::where('id', $id)->first();
    }

    public function update($request, $slug)
    {
        return Item::where('slug', $slug)->update($request);
    }

    public function delete($slug)
    {
        return Item::where('slug', $slug)->delete();
    }
}