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
    public function getDiscountManager(Request $stationId)
    {
      $discountManager = DB::table('discounts')
      ->where('discounts.stationId', $stationId->stationId)
      ->join('stations', 'discounts.stationId', '=', 'stations.stationId')
      ->get();
       return $discountManager;

    }
    public function addDiscount(Request $request)
    {
      DB::table('discounts')->insert([
        'stationId' => $request->stationId,
        'date' => $request->date,
        'percent' => $request->percent,
        'restrictions' => $request->restrictions,
    ]);

    }
    public function deleteDiscount(Request $request)
    {
      DB::table('discounts')
      ->where('discounts.discountsId', $request->discountId)
      ->delete();
    }
    
   
}
