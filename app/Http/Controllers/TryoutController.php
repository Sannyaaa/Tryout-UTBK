<?php

namespace App\Http\Controllers;

use App\Models\tryout;
use Illuminate\Http\Request;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tryout = Tryout::all();

        return view('layouts.dashboard.tryout.index', compact('tryout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tryout $tryout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tryout $tryout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tryout $tryout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tryout $tryout)
    {
        //
    }
}