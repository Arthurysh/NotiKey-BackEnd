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
    public function getUserCars(Request $userId)
    {
      $cars = DB::table('cars')
      ->where('cars.userId', $userId->userId)
      ->get();
       return $cars;

    }
    public function deleteCars(Request $request){
      DB::table('cars')
      ->where('carId', $request->idCars)
      ->delete();
    }
    public function addCars(Request $request){
      DB::table('cars')->insert([
        'brand' => $request->brand,
        'model' => $request->model,
        'userId' => $request->userId,
        'year' => $request->year,
        'type' => $request->type,
        'image' => $request->image,
        'nomera' => $request->nomera,
    ]);
    }
    public function getCarList()
    {
      $cars = DB::table('cars')
      ->select('carId', 'brand', 'model', 'userId', 'year', 'type', 'nomera')
      ->get();
       return $cars;

    }
    

    

    
}

