<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cotizacion")->insert([
            "modelo" => Str::random(10),
            "nombre" => Str::random(10),
            "email" => Str::random(10)."@gmail.com",
            "celular" => Str::random(10),
            "departamento" => Str::random(10),
            "ciudad" => Str::random(10),
            "created_at" => now(),
            
        ]);
    }
}
