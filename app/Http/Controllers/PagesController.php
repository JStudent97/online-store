<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function admin_page(){
       $providers = Provider::all() ;
       if(auth()->user()->user_role === 'admin') {
        return view('pages.admin_page')->with('providers', $providers);
       } else return redirect('/')->with('error', 'Unauthorized page');
       
    }
}
