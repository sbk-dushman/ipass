<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use Illuminate\Http\Request;
use App\CardStudent;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function searchPost(Request $request)
    {
        dd($request->ajax());
        $data = $request->search_req;
        $results = ListStudent::where('name', 'LIKE', '%' . $data . '%')
                            ->orWhere('surname', 'LIKE', '%' . $data . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                            ->orWhere('group_rus', 'LIKE', '%' . $data . '%')
                            ->orderBy('surname', 'ASC')
                            ->get();
        $group = Group::get();
        $cartStudents = CardStudent::get();
        return $request->all();
    }

    public function searchGet(Request $request)
    {

        $results = null;
        dump($request->all());
        return view('search', compact('results'));
    }

    public function searchAddPost(Request $request)
    {
        $data = $request->add_to_cart;
        $StudName = ListStudent::where('id', $data)
                                ->value('name');
        $StudSurname = ListStudent::where('id', $data)
                                ->value('surname');
        $StudLastname = ListStudent::where('id', $data)
                                ->value('lastname');
        $StudGroup = ListStudent::where('id', $data)
                                ->value('group');
        $issetName = CardStudent::where([
            'name' => $StudName,
            'surname' => $StudSurname,
            'lastname' => $StudLastname,
            'group' => $StudGroup
        ])->value('id');
        dump($StudName, $StudSurname, $StudLastname, $StudGroup);
        if( $issetName == true ) {
            //return redirect()->back();
        }else {
            DB::table('card_students')->insert([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'group' => $StudGroup
            ]);
        }
        
        //return redirect()->back();
    }
}
