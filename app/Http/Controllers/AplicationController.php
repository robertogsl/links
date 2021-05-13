<?php

namespace App\Http\Controllers;

use App\Aplication;
use App\Historic;
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
        return view('aplications', ['aplications' => auth()->user()->aplications]);
    }

    public function store(AplicationStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        
        $newAplication = tap(new Aplication($data))->save();
        $newAplication->configs()->create(['payload'=>""]);

        $data2['user_id'] = auth()->id();
        $data2['aplication_id'] = $newAplication->id;
        $data2['payload'] = "";

        $newHistoric = tap(new Historic($data2))->save();

        return redirect('/remoteConfig');
    }

    public function viewRegisterAplication()
    {
        return view('registerApp');
    }
}