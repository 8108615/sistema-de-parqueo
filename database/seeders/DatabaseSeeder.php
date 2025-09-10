<?php

namespace Database\Seeders;

use App\Models\Ajuste;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);

        //Usuario de super admin
        User::create([
            'name'=>'Super Admin',
            'email'=>'erick@gmail.com',
            'password'=>Hash::make('12345678'),
            'nombres'=>'Erick Fernando',
            'apellidos'=>'Morales Gil',
            'tipo_documento'=>'CI',
            'numero_documento'=>'8108615',
            'celular'=>'76658531',
            'fecha_nacimiento'=>'1991-12-20',
            'genero'=>'Masculino',
            'direccion'=>'Av. Cumavi/Barrio San Juan Calle 5/Nro225',
            'foto'=>null,
            'contacto_nombre'=>'Ruddy Morales',
            'contacto_telefono'=>'70241394',
            'contacto_parentesco'=>'Papa',
            'estado'=>true,
        ])->assignRole('SUPER-ADMIN');


        Ajuste::create([
            'nombre'=>'Ajuste Sistema de Parqueo Erick',
            'descripcion'=>'Sistema de Gestion de  Parqueo EFMG',
            'sucursal'=>'Santa Cruz',
            'direccion'=>'Av. Cumavi/Barrio San Juan Calle 5/Nro225',
            'telefonos'=>'76658532',
            'logo'=>'eIXvzuiEe9FYwY43VnwFsEieKvotgVQqb7rWdul7.jpg',
            'logo_auto'=>'bYZjdL9cssz2UoD5ZjZupOTghU9DMdxWRhHBPa8j.jpg',
            'divisa'=>'Bs',
            'correo'=>'fer@gmail.com',
            'pagina_web'=>'https://erickweb.com',
        ]);
    }
}
