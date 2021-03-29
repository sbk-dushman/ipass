<?php

namespace App\Http\Controllers;

use App\CardStudent;
use Illuminate\Http\Request;
use App\Group;
use App\ListStudent;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class MainController extends Controller
{
    public function home(){
        $groups_pag = Group::paginate(0);
        $groups = Group::get();
        // return view('home', compact('groups'));
        return view('Nhome', compact('groups', 'groups_pag'));
    }

    public function addCart(Request $request)
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
        // $students = ListStudent::where('group', $groupname)->get();
        $students = ListStudent::where('group', $groupname)->orderBy('surname', 'ASC')->get();
        $cartStudents = CardStudent::get();
        $sort = $request->sort;
        $groups = Group::get();
        $groups_pag = Group::paginate(1);
        // $groups = Group::paginate(6);
        return view('tabelGroup', compact('students', 'cartStudents', 'sort'));
    }

    public function selected(Request $request)
    {

        $studentDatas = CardStudent::paginate(10);
        // $studentDatas_s = CardStudent::get();
        $studentDatas_s = CardStudent::paginate(10);
        $studentDatas_print = CardStudent::select('id')->get();
        $data_select = [
            'data_one' => '1',
            'data_two' => '2'
        ];
        return view('selected', compact('studentDatas_s', 'studentDatas', 'studentDatas_print', 'data_select'));
    }

    public function selectedDelete(Request $request)
    {
        if( $request->ajax() ) {
            $studId = $request->studid;
            CardStudent::where('id', $studId)->delete();
        }

    }

    public function searchPost()
    {
        dump(1);
    }

    public function searchGet()
    {
        return view('search');
    }
}
