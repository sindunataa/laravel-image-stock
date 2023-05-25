<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        // $galeries = Galeries::latest()->simplePaginate(8);
        // $galery = Galeries::all();
        // $album = Albums::get();
        // $user = User::get();

        // $count_galery = $galery->count();
        // $count_album = $album->count();
    
        return view('home')
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
