<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AplicationController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = auth()->id();
        $aplications = \App\Aplication::all();
        dd($aplications);
        return view('dashboard', ['aplications' => $aplications, 'id' => $id]);
    }
}