<?php

namespace Database\Seeders;

use App\Models\Type_User;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Users = new User();
        $Users->email = "ali@gmail.com";
        $Users->password =  Hash::make("00000000");
        $Users->name = "Ali";
        $Users->type_id = 5;
        $Users->Status =1;
        $Users->gender_id = 1;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();


        $Users = new User();
        $Users->email = "amer@gmail.com";
        $Users->password =  Hash::make("12345678");
        $Users->name = "Amer";
        $Users->type_id = 5;
        $Users->Status =1;
        $Users->gender_id = 1;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();

    }
}
