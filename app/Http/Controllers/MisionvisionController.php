<?php

namespace App\Http\Controllers;

use App\misionvision;
use Illuminate\Http\Request;

class MisionvisionController extends Controller
{
    
        public function __construct()
        {
            $this->middleware('auth');
        } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        
           return view ('administrador.misionvision'); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\misionvision  $misionvision
     * @return \Illuminate\Http\Response
     */
    public function show(misionvision $misionvision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\misionvision  $misionvision
     * @return \Illuminate\Http\Response
     */
    public function edit(misionvision $misionvision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\misionvision  $misionvision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, misionvision $misionvision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\misionvision  $misionvision
     * @return \Illuminate\Http\Response
     */
    public function destroy(misionvision $misionvision)
    {
        //
    }
}
