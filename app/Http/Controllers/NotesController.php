<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function view(Request $userId)
    {
      $notes = DB::table('notes')
      ->join('status', 'notes.statusId', '=', 'status.statusId')
      ->join('stations', 'notes.stationId', '=', 'stations.stationId')
      ->join('cars', 'notes.carId', '=', 'cars.carId')
      ->where('notes.userId', $userId->userId)
      ->select('notes.noteId', 'stations.stationName', 'stations.adress',  'cars.brand', 'cars.model', 'notes.date',  'notes.time',  'status.status'  )
      ->get();

      foreach ($notes as $note) {
        $note->services = DB::table('services')
        ->join('notes_services', 'services.servicesId', '=', 'notes_services.servicesId')
        ->where('notes_services.noteId', $note->noteId)
        ->select('services.name', 'services.price', 'services.servicesId')
        ->get();

        $note->statusHistory = DB::table('status')
        ->join('statusHistory', 'status.statusId', '=', 'statusHistory.statusId')
        ->where('statusHistory.noteId', $note->noteId)
        ->select('status.status')
        ->get();

        $note->additionalServices = DB::table('additional_services')
        ->join('additionalServices', 'additional_services.addServicesId', '=', 'additionalServices.addServicesId')
        ->where('additionalServices.noteId', $note->noteId)
        ->get();

      }
      
      
      
      return $notes;
      
    }

    
    public function getStatus()
    {
      $status = DB::table('status')
      ->get();
      return $status;
    }
    public function getServices()
    {
      $status = DB::table('services')
      ->get();
      return $status;
    }




}
