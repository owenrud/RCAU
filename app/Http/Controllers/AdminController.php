<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function hero(){
        return view('hero.hero');
    }
    public function formHero(){
        return view('hero.createhero');
    }
    public function formEditHero(){
        return view('hero.edithero');
    }
    public function visiMisi(){
        return view('visimisi.visi_misi');
    }
    public function formVisi(){
        return view('visimisi.createvisi');
    }
    public function formEditVisi(){
        return view('visimisi.updatevisi');
    }
    public function formMisi(){
        return view('visimisi.createmisi');
    }
    public function formEditMisi(){
        return view('visimisi.editmisi');
    }
    public function gallery(){
        return view('gallery.gallery');
    }
    public function formGallery(){
        return view('gallery.creategallery');
    }
    public function formEditGallery(){
        return view('gallery.editgallery');
    }
    public function portfolio(){
        return view('portfolio.portfolio');
    }
    public function formPortfolio(){
        return view('portfolio.createportfolio');
    }
    public function formEditPortfolio(){
        return view('portfolio.editportfolio');
    }
    public function services(){
        return view('services.services');
    }
    public function formServices(){
        return view('services.createservices');
    }
    public function formEditServices(){
        return view('services.updateservices');
    }
    public function subs(){
        return view('subscribe.subscribe');
    }
}
