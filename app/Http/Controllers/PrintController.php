<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use App\CardStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PrintController extends Controller
{
    public function getPrint($id, Request $request)
    {
        $data = CardStudent::where('id', $id)->get();
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


        return view('print', compact('data', 'dateNow'));
    }
}
