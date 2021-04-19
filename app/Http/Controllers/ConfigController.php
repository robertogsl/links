<?php

namespace App\Http\Controllers;

class ConfigController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$id = auth()->user()->aplications[1];
        //dd($id);
        $configs = \App\Config::where('aplication_id', 1);
        // where('aplication_id', $aplications)
        // dd($configs);
        return view('config', ['configs' => $configs]);
    }
}