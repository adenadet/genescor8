<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $params = [
            'title' => 'Stories',
            'page_title' => 'Survival Stories, Success Stories',
        ];
        return view('stories')->with($params);
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
