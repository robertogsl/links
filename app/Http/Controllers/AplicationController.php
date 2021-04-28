<?php

namespace App\Http\Controllers;

use App\Aplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AplicationStoreRequest;

class AplicationController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', ['aplications' => auth()->user()->aplications]);
    }

    public function store(AplicationStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        
        $newAplication = tap(new Aplication($data))->save();
        $newAplication->configs()->create([
            'payload'=>"",
            'userLastAlteration'=> auth()->id()
            ]);

        return redirect('/remoteConfig');
    }

    public function viewRegisterAplication()
    {
        return view('registerApp');
    }
}