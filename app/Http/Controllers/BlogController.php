<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('stories');
    }

    public function welcome()
    {
        $params = [
            'title' => 'Welcome',
            'page_title' => 'Welcome',
        ];
        return view('stories')->with($params);
    }
}
