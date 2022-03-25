<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCashlessRequest;
use App\Http\Requests\UpdateCashlessRequest;
use App\Models\Cashless;

class CashlessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCashlessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashlessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cashless  $cashless
     * @return \Illuminate\Http\Response
     */
    public function show(Cashless $cashless)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cashless  $cashless
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashless $cashless)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashlessRequest  $request
     * @param  \App\Models\Cashless  $cashless
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashlessRequest $request, Cashless $cashless)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cashless  $cashless
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashless $cashless)
    {
        //
    }
}
