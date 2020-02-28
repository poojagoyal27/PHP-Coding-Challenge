<?php

namespace App\Http\Controllers;
use App\Caregiver;
class CaregiverDirectoryController extends Controller
{
    /**
     * Display the caregiver directory.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
      //getting all the records sorted by name in alphabetical order
      return view('caregivers-directory',['caregivers' => Caregiver::orderBy('name')->paginate(20)]);
  
    }
}
