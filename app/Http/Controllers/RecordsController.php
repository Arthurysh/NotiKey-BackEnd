<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordsController extends Controller
{
    public function view()
    {
      $records = DB::table('records')->get();
       return $records;

    }



}
