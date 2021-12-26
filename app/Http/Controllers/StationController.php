<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Station;

class StationController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'stationName' => ['required'],
            'adress' => ['required'],
            'description' => ['required'],
        ]);

        DB::table('stations')->insert([
            'stationName' => $request->stationName,
            'adress' => $request->adress,
            'description' => $request->description,
        ]);
    }

    public function view()
    {
      $station = DB::table('stations')->get();
       return $station;

    }
    public function getList()
    {
      $station = DB::table('stations')
      ->select('stationName', 'stationId')
      ->get();
       return $station;

    }
    public function delete(Request $request)
    {
      DB::table('stations')->where('stationId', $request->stationId)->delete();
    }
    public function edit(Request $request)
    {
      DB::table('stations')
      ->where('stationId', $request->stationId)
      ->update(
          ['stationId' => $request->stationId, 'stationName' => $request->stationName, 'adress' => $request->adress, 'description' => $request->description],
          
      );
    }
    public function getStatistic(){
      $months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
      $stationStatistic = [];
      foreach ($months as $key => $value) {
        $result = DB::table('stations')
        ->whereMonth('created_at', $value)
        ->count();
        array_push($stationStatistic, $result);
      }
      return $stationStatistic;
    }
}
