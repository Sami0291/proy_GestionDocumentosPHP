<?php

//namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::updateOrCreate([
            "nombre" => "Empleado",
            "estado_registro" => "A"
        ]);
        Rol::updateOrCreate([
            "nombre" => "Tecnico",
            "estado_registro" => "A"
        ]);
    }
}