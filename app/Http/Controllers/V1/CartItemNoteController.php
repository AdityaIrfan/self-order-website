<?php

namespace App\Http\Controllers\V1;

use App\Models\CartItemNote;
use App\Services\CartItemNote\ICartItemNoteService;
use App\Validations\CartItemNoteValidation;
use Illuminate\Http\Request;

class CartItemNoteController extends Controller
{
    protected $_cartItemNoteValidation;
    protected $_cartItemNoteService;

    public function __construct(
        CartItemNoteValidation $_cartItemNoteValidation,
        ICartItemNoteService $_cartItemNoteService
    )
    {
        $this->_cartItemNoteValidation = $_cartItemNoteValidation;
        $this->_cartItemNoteService = $_cartItemNoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $this->_cartItemNoteRepo->getSumByIP($request->ip());
        echo "berhasil";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uuid = 'bc07f227-ffcb-451a-ba13-9d908a27c9e6';

        return view('note', ['uuid' => $uuid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartItemNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $itemUuid)
    {
        $this->_cartItemNoteService->store($request, $itemUuid);
        
        return self::index($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartItemNote  $cartItemNote
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartItemNote  $cartItemNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CartItemNote $cartItemNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartItemNoteRequest  $request
     * @param  \App\Models\CartItemNote  $cartItemNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->_cartItemNoteRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartItemNote  $cartItemNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->_cartItemNoteRepo->delete($id);
    }
}
