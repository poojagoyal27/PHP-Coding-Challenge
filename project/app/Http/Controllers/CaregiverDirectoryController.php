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
      return view('caregivers-directory');
    }
}
