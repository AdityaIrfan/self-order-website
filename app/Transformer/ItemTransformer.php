<?php

namespace App\Transformer;


class ItemTransformer
{
    public function oneTransform($item)
    {
        return [
            'id' => $item->id,
            'image' => $item->image,
            'name' => $item->name,
            'price' => $item->price,
            'slug' => $item->slug,
            'status' => $item->status
        ];
    }

    public function trasformWithPaginate($data)
    {
        $items = [];

        foreach ($data as $item) {
            array_push($items, self::oneTransform($item));
        }

        return [
            "items" => $items,  
            "current_page" => $data->currentPage(),
            "total_page" => $data[0]->count()
        ];
    }
}