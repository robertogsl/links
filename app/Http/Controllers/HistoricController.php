<?php

namespace App\Http\Controllers;

use App\Aplication;
use App\Historic;
use App\User;
use Illuminate\Support\Facades\Auth;

class HistoricController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(string $id)
    {
        return view('historic', [
            'historics' => Historic::where('aplication_id', $id)
            ->with(['aplication', 'user'])->get(),
        ]);
    }
}