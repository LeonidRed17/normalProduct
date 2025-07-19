<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
    public function home()
    {
        return view('primary.primary');
    }
    public function about()
    {
        return view('about.about');
    }
    public function news()
    {
        return view('news.news');
    }

}
