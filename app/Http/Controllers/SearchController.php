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
        // dd($request->all());

        if( $request->search_req ) {
            $data = $request->search_req;
            $results = ListStudent::where('name', 'LIKE', '%' . $data . '%')
                                ->orWhere('surname', 'LIKE', '%' . $data . '%')
                                ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                                ->orWhere('group_rus', 'LIKE', '%' . $data . '%')
                                ->orderBy('surname', 'ASC')
                        // ->paginate(1);
                        ->get();
            $cartStudents = CardStudent::get();

            return view('search', compact('results', 'cartStudents'));
        }
        elseif($request->test) {
            $data = $request->test;
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
            if( $issetName == true ) {
                // return redirect()->back();
            }else {
                DB::table('card_students')->insert([
                    'name' => $StudName,
                    'surname' => $StudSurname,
                    'lastname' => $StudLastname,
                    'group' => $StudGroup
                ]);
            }
        }
    }

    public function searchGet()
    {

        $results = null;

        return view('search', compact('results'));
    }

    public function searchAddPost(Request $request)
    {
        if( $request->ajax() ) {
            return $request->ajax();
        }
        return $request->response;
        $data = $request->response;
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
        if( $issetName == true ) {
            return redirect()->back();
        }else {
            DB::table('card_students')->insert([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'group' => $StudGroup
            ]);
        }
        return redirect()->back();
    }
}
