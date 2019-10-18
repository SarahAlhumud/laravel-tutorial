<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //index action
    public function index(){
        $tests = [
            'First',
            'Second',
            'Third'
        ];

        return view('welcome', ['tests' => $tests]);

    }
}
