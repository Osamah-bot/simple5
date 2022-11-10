<?php
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [

            [

               'account_type'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('abcd1234'),

            ],

            [

               'account_type'=>'Patient',
               'email'=>'patient@gmail.com',
               'password'=> bcrypt('12345678'),

            ],

        ];


        foreach ($user as $key => $value) {

            Account::create($value);

        }
    }
}
