<?php

use Database\Seeders\ProductoSeeder;
use Illuminate\Database\Seeder;
use ProductoSeeder as GlobalProductoSeeder;
use TipoRolSeeder as GlobalTipoRolSeeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                $this->call(DepartamentoSeeder::class);
                $this->call(ProvinciaSeeder::class);
                $this->call(DistritoSeeder::class);
                $this->call(RolSeeder::class);
                $this->call(UserSeeder::class);                
        }
}