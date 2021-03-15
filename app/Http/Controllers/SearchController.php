<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPost(Request $request)
    {

        $data = $request->search_req;
        $results = ListStudent::where('name', 'LIKE', '%' . $data . '%')
                            ->orWhere('surname', 'LIKE', '%' . $data . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                            ->orWhere('group_rus', 'LIKE', '%' . $data . '%')
                            ->get();
        
        $group = Group::get();
        return view('search', compact('results', 'group'));
    }

    public function searchGet()
    {

        $results = null;
        return view('search', compact('results'));
    }
}
