<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    public function run(): void{
        $user = [
            ['num_documento' => '',
            'tipo_documento' => '',
            'nombre' => 'AdminCide',
            'apellido' => '',
            'genero' => '',
            'estado_civil' => '',
            'email' => 'AdminCide@gmail.com',
            'password' => Hash::make('Cide899999034-1'),
            'role_id' => '1',
            'municipio_id' => '2'],

            ['num_documento' => '1013107003',
            'tipo_documento' => 'Cedula de ciudadania',
            'nombre' => 'Sebastian',
            'apellido' => 'Triana',
            'genero' => 'Masculino',
            'estado_civil' => 'Soltero',
            'email' => 'sebas@gmail.com',
            'password' => Hash::make('sebas'),
            'role_id' => '1',
            'municipio_id' => '1'],

            ['num_documento' => '1012140550',
            'tipo_documento' => 'Cedula de ciudadania',
            'nombre' => 'Duvan',
            'apellido' => 'Triana',
            'genero' => 'Masculino',
            'estado_civil' => 'Soltero',
            'email' => 'duver@gmail.com',
            'password' => Hash::make('duver'),
            'role_id' => '4',
            'municipio_id' => '1'],

            ['num_documento' => '147789112',
            'tipo_documento' => 'Cedula de ciudadania',
            'nombre' => 'Camilo',
            'apellido' => 'Acevedo',
            'genero' => 'Masculino',
            'estado_civil' => 'Soltero',
            'email' => 'camilo@gmail.com',
            'password' => Hash::make('camilo'),
            'role_id' => '5',
            'municipio_id' => '1'],
        ];

        DB::table('users')->insert($user);
    }
}
