<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use App\CardStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class PrintController extends Controller
{
    public function getPrint(Request $request)
    {
        $datas = CardStudent::get();
        $datass = CardStudent::find('id');
        // dump($datas);
        $mass = [];
        foreach( $datas as $data ) {
            $mass = Arr::prepend($mass,$data->id);
        }
        $mass = Arr::sortRecursive($mass);
        // dump($request->all());
        $select = $request->all($mass);

        $months = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря'
        ];
        $dateNow = $months[Date::now()->format('m')];
        return view('print', compact('datas', 'dateNow', 'select'));
        // return view('print');
    }
}
