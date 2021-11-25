<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function getList(Request $userId)
    {
      $station = DB::table('cars')
      ->select('model', 'carId', 'brand')
      ->where('cars.userId', $userId->userId)
      ->get();
       return $station;

    }
}

