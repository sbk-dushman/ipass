<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function group() 
    {   //21
        $groups = Group::paginate(6);
        return view('Nhome', compact('groups'));
    }

    public function group_table($groupname) 
    {
        $groups = Group::paginate(6);
        $students = ListStudent::where('group', $groupname)->orderBy('surname', 'ASC')->get();
        return view('tabelGroup', compact('groups', 'students'));
    }
}
