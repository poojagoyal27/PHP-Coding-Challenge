<?php
//namespace App\Http\Controllers;
Use Carbon\Carbon;


use App\Caregiver;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\LicenseExpiring;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


/**
 * List all skilled nurse license details.
 */
Artisan::command('licenses:list', function () {
    $headers = ['License Owner', 'License Expiry Date'];
    $caregivers = Caregiver::select('name','license_expiration')->whereNotNull('license_expiration')->get();


    $this->table($headers, $caregivers);

})->describe('List all skilled nurse license details');


/**
 * Notify nurses with licenses expiring soon.
 */

Artisan::command('licenses:notify-expiring-soon', function () {
//Task 4
  $exp_limit=Config::get('caregivers.license_renewal_reminder_in_days');
  $nurse_data= Caregiver::whereNotNull('license_expiration')->get();
  $dt     = Carbon::now();

  foreach($nurse_data as $caregiver)
  {
    $expiration_days= $dt->diffInDays($caregiver->license_expiration);
    if($expiration_days <$exp_limit)
    {

      $email = new LicenseExpiring($caregiver);
     \Mail::to($caregiver->email)->cc('goyalpooja27@gmail.com')->send($email);


//});

      //send emails script
    }
  }


    $this->info('Done');

})->describe('Notify nurses with licenses expiring soon');
