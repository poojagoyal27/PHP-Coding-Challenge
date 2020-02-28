<?php

namespace App\Http\Controllers;
use Config;
use App\Agency;
use App\Caregiver;
use Illuminate\Http\Request;

class CaregiverController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function create(Agency $agency)
    {
        $positions = config('caregivers.positions');



        return view('caregivers.create', compact('agency', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Agency $agency)
    {

      //task 5
      $positions = config('caregivers.positions');
      $validatedData = $request->validate([
      'name' => 'required|regex:/^[\pL\s\-]+$/u',
      'email' => 'required|email',
     'position' => 'string|required|in:' . implode(',', $positions),
      'licence_number' => 'string|required_if_attribute:position,==,Skilled Nurse',
      'licence_expiration' => 'date_format:y-m-d|required_if_attribute:position,==,Skilled Nurse'
    ]);
    $request['agency_id']=$agency->id;

      Caregiver::create($request->all());
        return redirect()
            ->route('agencies.show', $agency)
            ->with('status', 'Caregiver created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @param  \App\Caregiver  $caregiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency, Caregiver $caregiver)
    {

       $temp_caregiver = Caregiver::findOrFail($caregiver->id);
      $temp_caregiver->delete();  
        return redirect()
            ->route('agencies.show', $agency)
            ->with('status', 'Caregiver deleted!');
    }
}
