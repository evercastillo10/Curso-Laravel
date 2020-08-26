<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'usuario' => 'administrator',
            'nombre' => 'Ever',
            'password' => bcrypt('123123')
        ]);
        DB::table('usuario')->insert([
            'usuario' => 'supervisor',
            'nombre' => 'Karina',
            'password' => bcrypt('123123')
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'estado' => 1
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 3,
            'usuario_id' => 2,
            'estado' => 1
        ]);
    }
}
