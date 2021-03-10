<?php

namespace App\Http\Controllers;

use App\CardStudent;
use Illuminate\Http\Request;
use App\Group;
use App\ListStudent;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home(){
        // $groups = Group::get();
        $groups = Group::paginate(2);
        // dd($paginator);
        return view('home', compact('groups'));
    }

    public function addCart($groupname, Request $request)
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

    public function group($groupname, Request $request)
    {

        $students = ListStudent::where('group', $groupname)->get();
        $cartStudents = CardStudent::get();
        // dump($cartStudents);
        

        return view('group', compact('students', 'cartStudents'));
    }

    public function selected()
    {
        $studentDatas = CardStudent::get();
        dump($studentDatas);
        return view('selected', compact('studentDatas'));
    }

    public function selectedDelete(Request $request)
    {
        dump($request->all());
    }

    public function dropFile($var = null)
    {
        return view('dropFile');
    }
}
