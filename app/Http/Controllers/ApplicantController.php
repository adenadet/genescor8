<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function chats()
    {
        $params = [
            'page_title' => 'Chats',
        ];
        return view('applicant')->with($params);
    }

    public function contacts()
    {
        $params = [
            'page_title' => 'Contacts',
        ];
        return view('applicant')->with($params);
    }

    public function dashboard()
    {
        $params = [
            'page_title' => 'Dashboard',
        ];
        return view('applicant')->with($params);
    }

    public function departments()
    {
        $params = [
            'page_title' => 'Departments',
        ];
        return view('applicant')->with($params);
    }

    public function internet()
    {
        $params = [
            'page_title' => 'Internet',
        ];
        return view('applicant')->with($params);
    }

    public function notices()
    {
        $params = ['page_title' => 'Notice Board',];
        return view('applicant')->with($params);
    }

    public function policies()
    {
        $params = [
            'page_title' => 'Policies',
        ];
        return view('applicant')->with($params);
    }

    public function profile()
    {
        $params = [
            'page_title' => 'Profile',
        ];
        return view('applicant')->with($params);
    }

    public function settings()
    {
        $params = [
            'page_title' => 'Settings',
        ];
        return view('applicant')->with($params);
    }

    public function staff_month()
    {
        $params = [
            'page_title' => 'Staff of the Month',
        ];
        return view('applicant')->with($params);
    }

    public function ticketing()
    {
        $params = [
            'page_title' => 'Tickets',
        ];
        return view('applicant')->with($params);
    }

    public function users()
    {
        $params = [
            'page_title' => 'Users',
        ];
        return view('applicant')->with($params);
    }

    public function index()
    {
        $params = [
            'page_title' => 'Dashboard',
        ];
        return view('applicant')->with($params);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
