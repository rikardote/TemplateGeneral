<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function Index()
    {
        return view('about');
    }

    public function ContactMethod()
    {
        return view('contact');
    }
}
