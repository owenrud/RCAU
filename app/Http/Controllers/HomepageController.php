<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomepageController extends Controller
{
    public function home(){

        return view('FE.index');
    
    }

    public function about(){

        return view('FE.about');
     
    }
    public function portfolio(){
        
        return view('FE.portfolio');
     
    }
    public function gallery(){
        return view('FE.gallery');
     
    }
    public function channel(){


        return view('FE.channel');
     
    }
}
