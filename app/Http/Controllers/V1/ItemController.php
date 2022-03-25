<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\V1\Controller;
use App\Http\Requests\UpdateItemRequest;
use App\Services\Item\IItemService;
use App\Validations\ItemValidation;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $_itemService;
    protected $_validationItem;

    public function __construct(
        IItemService $_itemService,
        ItemValidation $_validationItem
    )
    {
        $this->_itemService = $_itemService;
        $this->_validationItem = $_validationItem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->_itemService->getWithPaginate();

        return view('customer.app', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $this->_validationItem->storeItem($request);

        // store item
        $this->_itemService->store($request);
        
        return redirect('admin/item/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return $this->_itemService->getOneBySlug($slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return $this->_itemService->getOneBySlug($slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $slug)
    {
        return $this->_itemService->update($request, $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        return $this->_itemService->delete($slug);
    }
}
