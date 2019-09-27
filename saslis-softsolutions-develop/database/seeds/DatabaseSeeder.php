<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'nombre' => "Daniel",
            'apellidos' => "Lopez Jaillita",
            'email' => "dlopez@gmail.com",
            'password' => bcrypt("password"),
            'cargo' => "admin"
        ]);

        DB::table('auxiliares')->insert([
            'id_auxiliar' => 6,
            'nombre' => "Wilmer",
            'apellidos' => "Perez Salinas",
            'email' => "wperez@gmail.com",
            'password' => bcrypt("password"),
            'cargo' => "auxiliar"
        ]);

        DB::table('docentes')->insert([
            'codsis_doc' => 12345678,
            'nombre' => "Sandro",
            'apellidos' => "Lopez Huanca",
            'email' => "slopez@gmail.com",
            'password' => bcrypt("password"),
            'cargo' => "docente",
            'activo' => true
        ]);

        DB::table('estudiantes')->insert([
            'codsis_est' => 87654321,
            'nombre' => "Alejandro",
            'apellidos' => "Matias Laredo",
            'email' => "amatias@gmail.com",
            'password' => bcrypt("password"),
            'cargo' => "estudiante"
        ]);

        $labos = [
            ['numero_lab' => 1, 'capacidad' => 60],
            ['numero_lab' => 2, 'capacidad' => 50],
            ['numero_lab' => 3, 'capacidad' => 40],
        ];
        DB::table('laboratorios')->insert($labos);
    }
}
