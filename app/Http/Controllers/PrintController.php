<?php

namespace App\Http\Controllers;

use App\Group;
use App\ListStudent;
use App\CardStudent;
use Illuminate\Http\Request;


class PrintController extends Controller
{
    public function getPrint($id = null, Request $request)
    {
        return view('print');
        dump($request->all());
    }
}
