<?php

namespace App\Http\Controllers;

use App\Aplication;
use App\Http\Requests\AplicationStoreRequest;

class NewAplicationController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('registerApp');
    }

    public function store(AplicationStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        
        tap(new Aplication($data))->save();
    
        return redirect('/remoteConfig');
    }
}