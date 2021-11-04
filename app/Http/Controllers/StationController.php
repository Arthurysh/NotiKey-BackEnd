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
            'stationID' => ['required'],
            'name' => ['required'],
            'adress' => ['required'],
            'description' => ['required'],
        ]);

        DB::table('stations')->insert([
            'stationID' => $request->stationID,
            'name' => $request->name,
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
      DB::table('stations')->where('stationID', $request->Id)->delete();
    }
    public function edit(Request $request)
    {
      DB::table('stations')
      ->where('stationID', $request->stationID)
      ->update(
          ['stationID' => $request->stationID, 'name' => $request->name, 'adress' => $request->adress, 'description' => $request->description],
          
      );
    }
}
