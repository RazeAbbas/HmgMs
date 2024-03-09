<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = "Talha";
        $user->last_name = "javaid";
        $user->email = "talha@gmail.com";
        $user->password = Hash::make("abc12345");
        $user->roles = 1;
        $user->phone = "123456789011";
        $user->cnic = "12345";
        $user->city = "sargodha";
        $user->address = "sargodha";
        $user->save();
    }
}
