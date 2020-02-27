
<?php
Use Carbon\Carbon;
$dt     = Carbon::now();
$expiration_date=$nurse -> license_expiration;
$expiration_days= $dt->diffInDays($expiration_date);
$exp_limit=Config::get('caregivers.license_renewal_reminder_in_days');

?>


<span class="badge {{ $expiration_days>=$exp_limit ? "badge-warning" : "badge-danger" }} ">{{ $expiration_date->diffForHumans($dt) }}</span>
