<?php

use App\Models\Persona;
use App\Models\UserRol;
use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $usuario = User::firstOrCreate(
            [
                "rol_id"=> null,
                "username"=>"00000000",

            ],
            [
                "password"=>"00000000",
            ]
        );

        
    }

    
}