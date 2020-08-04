<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login(){
        $title = 'Login page';
        //return view ('pages.index', compact('title'));
        return view('pages.mlogin')->with('title', $title);
    }
    public function index(){
        $title = 'Welcome to Laravel!';
        //return view ('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'About';
        //return view ('pages.about');
        return view('pages.about')->with('title', $title);
    }
    public function services(){
       $data = array(
           'title' => 'Services',
           'services' => ['Web design', 'SEO', 'Web development']
       );
        //return view ('pages.services');
        return view('pages.services')->with($data);
    }
}
