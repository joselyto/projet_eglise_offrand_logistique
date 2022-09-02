<?php

namespace App\Http\Controllers;

use App\Models\lienvideo;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $videos = lienvideo::all();
        return view('index', compact('videos'));
    }
    public function videos(){
        $videos = lienvideo::orderBy('id', 'desc')->get();
        return view('videos', compact('videos'));
    }
    public function menu(){
        return view('app.index.menu');
    }
    public function admini_initail(){
        return view('auth.register_initial');
    }
    public function contact(Request $request){
        dd($request);
    }
}
