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
        // var_dump($request->name);
        // $data = $request->all();
        // var_dump($request->ajax());
        if( $request->ajax() ) {
            if( isset($request->name) ) {
                $data = $request->name;
                $results = ListStudent::where('name', 'LIKE', '%' . json_decode($data) . '%')
                            ->orWhere('surname', 'LIKE', '%' . json_decode($data) . '%')
                            ->orWhere('lastname', 'LIKE', '%' . json_decode($data) . '%')
                            ->orWhere('group_rus', 'LIKE', '%' . json_decode($data) . '%')
                            ->orderBy('surname', 'ASC')
                            ->get();
                return response()->json($results);
            }
        }
        // json_decode($data, true);
        // 
        // // var_dump($results);
        // foreach( $results as $res ) {
        //     $data = [
        //         'name' => $res->name,
        //         'surname' => $res->surname,
        //         'lastname' => $res->lastname,
        //         'group' => $res->group
            // ];
            // var_dump($data, true);
        // }
        // echo $data;
        // return $res;
        // $group = Group::get();
        // $cartStudents = CardStudent::get();

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
