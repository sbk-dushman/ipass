<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class MainController extends Controller
{


    public function home(){

        return view('home');
    }
    public function group(){
        return view('group');
    }
    public function selected(){
        return view('selected');
    }
    public function dropFile(Type $var = null)
    {
        return view('dropFile');
    }
}
