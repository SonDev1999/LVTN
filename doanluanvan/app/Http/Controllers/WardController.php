<?php

namespace App\Http\Controllers;

use App\Models\ward;
use App\Http\Requests\StorewardRequest;
use App\Http\Requests\UpdatewardRequest;

class WardController extends Controller
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
     * @param  \App\Http\Requests\StorewardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(ward $ward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewardRequest  $request
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewardRequest $request, ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(ward $ward)
    {
        //
    }
}
