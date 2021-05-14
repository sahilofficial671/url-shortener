<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     *  This will return index view
     *  @param Request $request
     *  @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('home.index');
    }
}
