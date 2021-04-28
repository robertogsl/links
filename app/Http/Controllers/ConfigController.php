<?php

namespace App\Http\Controllers;

use App\Config;
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
        Config::where('id', $id)->update($data);
        return redirect('/remoteConfig');
    }
}