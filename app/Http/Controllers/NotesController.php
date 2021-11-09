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
      ->get();
       return $notes;

    }



}
