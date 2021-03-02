<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/Group;

class MainController extends Controller
{


    public function home($code)
    {
        $group = Group::where('code', $code)->first();
        return view('home',compact('group'));
    }
}
