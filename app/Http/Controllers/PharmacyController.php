<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $params = [
            'title' => 'Pharmacy',
            'page_title' => 'Pharmacy',
        ];
        return view('stories')->with($params);
    }
}
