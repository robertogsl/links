<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application register links.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('links');
    }

    public function store(LinkStoreRequest $request)
    {
        $data = $request->validated();
    
        tap(new Link($data))->save();
    
        return redirect('/');
    }
}
