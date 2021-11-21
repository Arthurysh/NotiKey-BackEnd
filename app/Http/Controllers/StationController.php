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
}
