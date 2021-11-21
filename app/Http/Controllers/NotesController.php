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
      ->join('cars', 'notes.carId', '=', 'cars.carId')
      // ->join('notes_services', 'notes.noteId', '=', 'notes_services.noteId')
      // ->join('services', 'notes_services.servicesId', '=', 'services.servicesId')
      ->get();

      foreach ($notes as $note) {
        $note->services = DB::table('services')
        // ->join('notes_services', 'notes.noteId', '=', 'notes_services.noteId')
        ->join('notes_services', 'services.servicesId', '=', 'notes_services.servicesId')
        ->where('notes_services.noteId', $note->noteId)
        ->select('services.name', 'services.price', 'services.servicesId')
        ->get();
      }
      
      // $services = DB::table('notes_services')
      // ->join('notes', 'notes_services.noteId', '=', 'notes.noteId')
      // ->join('services', 'notes_services.servicesId', '=', 'services.servicesId')
      // ->get();

      return $notes;
    }

    
    public function getStatus()
    {
      $status = DB::table('status')
      ->get();
      return $status;
    }



}
