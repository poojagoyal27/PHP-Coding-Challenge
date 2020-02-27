<?php

namespace App\Http\Controllers;
use App\Caregiver;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {


        //$data=Caregiver::groupBy('position')->select('position',DB::raw('count(*) as total'))->get()]'
        $chart_data= Caregiver::groupBy('position')->select('position',DB::raw('count(*) as total'))->get();
        $nurse_data= Caregiver::orderBy('license_expiration', 'ASC')->where('position', '=', 'Skilled Nurse')->take(10)->get();
        $final_data=[
          "chart_data" => $chart_data,
          "nurse_data"=>$nurse_data
        ];
        return view('dashboard',compact('final_data'));

    }
}
