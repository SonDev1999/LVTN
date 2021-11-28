<?php

namespace App\Http\Controllers;

use App\Models\province;
use App\Http\Requests\StoreprovinceRequest;
use App\Http\Requests\UpdateprovinceRequest;

class ProvinceController extends Controller
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
     * @param  \App\Http\Requests\StoreprovinceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprovinceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprovinceRequest  $request
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprovinceRequest $request, province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(province $province)
    {
        //
    }
}
