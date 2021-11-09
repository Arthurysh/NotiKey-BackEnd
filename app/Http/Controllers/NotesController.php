<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function view()
    {
      $notes = DB::table('notes')
      ->join('status', 'notes.statusId', '=', 'status.statusId')
      ->join('stations', 'notes.stationId', '=', 'stations.stationId')
      ->join('services', 'notes.servicesId', '=', 'services.servicesId')
      ->get();
       return $notes;

    }



}
