<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DiscountController extends Controller
{
    public function getDiscountController()
    {
      $discount = DB::table('discounts')
      ->join('stations', 'discounts.stationId', '=', 'stations.stationId')
      ->get();
       return $discount;

    }
}
