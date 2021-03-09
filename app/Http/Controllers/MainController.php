<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\ListStudent;

class MainController extends Controller
{
    public function home(){
        // $groups = Group::get();
        $groups = Group::paginate(2);
        // dd($paginator);
        return view('home', compact('groups'));
    }
    public function group($groupname)
    {

        $students = ListStudent::where('group', $groupname)->get();
        return view('group', compact('students'));
    }
    public function selected(){

        return view('selected');
    }
    public function dropFile($var = null)
    {
        return view('dropFile');
    }
}
