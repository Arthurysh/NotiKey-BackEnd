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
      ->join('time', 'notes.timeId', '=', 'time.timeId')
      ->where('notes.userId', $userId->userId)
      ->select('notes.noteId', 'stations.stationName', 'stations.adress',  'cars.brand', 'cars.model', 'notes.date',  'time.time',  'status.status',  )
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
    public function getTime()
    {
      $time = DB::table('time')
      ->get();
      return $time;
    }
    public function insertNotes(Request $request)
    {
      $request->validate([
        'cars' => ['required'],
        'date' => ['required'],
        'services' => ['required'],
        'station' => ['required'],
        'time' => ['required']
    ]);

    DB::table('notes')->insert([
        'carId' => $request->cars,
        'stationId' => $request->station,
        'timeId' => $request->time,
        'date' => $request->date,
        'userId' => $request->userId,
        'statusId' => $request->statusId,
    ]);

    }
    public function deleteNotes(Request $request){
      DB::table('additionalServices')
      ->where('noteId', $request->idNotes)
      ->delete();
      DB::table('notes_services')
      ->where('noteId', $request->idNotes)
      ->delete();
      DB::table('statusHistory')
      ->where('noteId', $request->idNotes)
      ->delete();
      DB::table('notes')
      ->where('noteId', $request->idNotes)
      ->delete();
    }

}
