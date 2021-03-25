<?php

namespace App\Http\Controllers;

use App\CardStudent;
use App\Group;
use App\ListStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GetController extends Controller
{
    public function group()
    {   //21
        $groups = Group::paginate(6);
        return view('Nhome', compact('groups'));
    }

    public function group_table($groupname)
    {
        $students = ListStudent::where('group', $groupname)->orderBy('surname', 'ASC')->get();
        $cart = CardStudent::get();
        $datas = [];
        foreach( $cart as $item ) {
            $datas = Arr::prepend($datas, [
                'name' => $item->name,
                'surname' => $item->surname,
                'lastname' => $item->lastname,
                'group' => $item->group
            ]);
        }
        $groups = Group::paginate(6);

        return view('tabelGroup', compact('groups', 'students', 'cart', 'datas'));
    }

    public function getPersonal()
    {
        return view('personal');
    }
}
