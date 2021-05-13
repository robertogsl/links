<?php

namespace App\Http\Controllers;

use App\Config;
use App\Historic;
use App\Http\Requests\ConfigStoreRequest;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(string $id)
    {
        $config = Config::where('id', $id)->first();
        return view('config', ['config' => $config]);
    }

    public function store(ConfigStoreRequest $request, string $id) 
    {
        $data = $request->validated();
        $newConfig = Config::where('id', $id)->update($data);
        
        $data2['user_id'] = auth()->id();
        $data2['aplication_id'] = $id;
        $data2['payload'] = $request->payload;

        $newHistoric = tap(new Historic($data2))->save();

        return redirect('/remoteConfig');
    }
}