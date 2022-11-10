User::factory()->count(20)->create()<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
   
    return [
      
        // 'fname'=>$fname,
        // 'lname' =>$faker->lname,
         'email' => $faker->email,
        // 'account_id'=> $account_id,
        // 'mobile' => $faker->phone,
        // 'birth' => $faker->birth,
        // 'gender'=>$faker->gender, 
        // 'country' => 'YE',
        // 'city' => $faker->city,
        // 'zone' => $faker->zone,
        // 'image'=>$faker->img_url,
    ];
});
