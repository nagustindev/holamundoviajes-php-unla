<?php

namespace App\Controllers;

class Ayuda extends BaseController
{
    
    public function ayuda(): string
    {
        return view('ayuda/ayuda');
    }

    public function about(): string
    {
        return view('ayuda/about');
    }
    public function faq(): string
    {
        return view('ayuda/faq');
    }
    public function contact(): string
    {
        return view('ayuda/contact');
    }
}
