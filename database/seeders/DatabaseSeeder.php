<?php

namespace Database\Seeders;

use App\Models\Ajuste;
use App\Models\Cliente;
use App\Models\Espacio;
use App\Models\Tarifa;
use App\Models\User;
use App\Models\Vehiculo;
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

        
        Ajuste::create([
            'nombre'=>'Ajuste Sistema de Parqueo Erick',
            'descripcion'=>'Sistema de Gestion de  Parqueo EFMG',
            'sucursal'=>'Santa Cruz',
            'direccion'=>'Av. Cumavi/Barrio San Juan Calle 5/Nro225',
            'telefonos'=>'76658532',
            'logo'=>'eIXvzuiEe9FYwY43VnwFsEieKvotgVQqb7rWdul7.jpg',
            'logo_auto'=>'VoPGPgGZLjB7KDoTgiwxxqONceKT1olQ8uTtQzlD.png',
            'divisa'=>'Bs',
            'correo'=>'fer@gmail.com',
            'pagina_web'=>'https://erickweb.com',
        ]);

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

        //Usuario de ADMINISTRADOR
        User::create([
            'name'=>'Ana Garcia Lopez',
            'email'=>'administrador@gmail.com',
            'password'=>Hash::make('12345678'),
            'nombres'=>'Ana Maria',
            'apellidos'=>'Garcia Lopez',
            'tipo_documento'=>'CI',
            'numero_documento'=>'8108616',
            'celular'=>'76658532',
            'fecha_nacimiento'=>'1992-12-21',
            'genero'=>'Femenino',
            'direccion'=>'Barrio Fatima',
            'contacto_nombre'=>'Maria Lopez',
            'contacto_telefono'=>'70241395',
            'contacto_parentesco'=>'Madre',
            'estado'=>true,
        ])->assignRole('ADMINISTRADOR');


        //Usuario de OPERADOR
        User::create([
            'name'=>'Carlos Mendez Silva',
            'email'=>'operador@gmail.com',
            'password'=>Hash::make('12345678'),
            'nombres'=>'Carlos',
            'apellidos'=>'Mendez Silva',
            'tipo_documento'=>'CI',
            'numero_documento'=>'8108617',
            'celular'=>'76658533',
            'fecha_nacimiento'=>'1992-12-21',
            'genero'=>'Masculino',
            'direccion'=>'Calle Secundaria #789, Villa Nueva',
            'contacto_nombre'=>'Rosa Mendez',
            'contacto_telefono'=>'70241397',
            'contacto_parentesco'=>'Hermana',
            'estado'=>true,
        ])->assignRole('OPERADOR');


        Espacio::create(['numero' => '1', 'estado' => 'libre',]);
        Espacio::create(['numero' => '2', 'estado' => 'libre',]);
        Espacio::create(['numero' => '3', 'estado' => 'libre',]);
        Espacio::create(['numero' => '4', 'estado' => 'libre',]);
        Espacio::create(['numero' => '5', 'estado' => 'libre',]);
        Espacio::create(['numero' => '6', 'estado' => 'libre',]);
        Espacio::create(['numero' => '7', 'estado' => 'libre',]);
        Espacio::create(['numero' => '8', 'estado' => 'libre',]);
        Espacio::create(['numero' => '9', 'estado' => 'libre',]);
        Espacio::create(['numero' => '10', 'estado' => 'libre',]);
        Espacio::create(['numero' => '11', 'estado' => 'libre',]);
        Espacio::create(['numero' => '12', 'estado' => 'libre',]);
        Espacio::create(['numero' => '13', 'estado' => 'libre',]);
        Espacio::create(['numero' => '14', 'estado' => 'libre',]);
        Espacio::create(['numero' => '15', 'estado' => 'libre',]);
        Espacio::create(['numero' => '16', 'estado' => 'libre',]);
        Espacio::create(['numero' => '17', 'estado' => 'libre',]);
        Espacio::create(['numero' => '18', 'estado' => 'libre',]);
        Espacio::create(['numero' => '19', 'estado' => 'libre',]);
        Espacio::create(['numero' => '20', 'estado' => 'libre',]);
        Espacio::create(['numero' => '21', 'estado' => 'libre',]);
        Espacio::create(['numero' => '22', 'estado' => 'libre',]);
        Espacio::create(['numero' => '23', 'estado' => 'libre',]);
        Espacio::create(['numero' => '24', 'estado' => 'libre',]);
        Espacio::create(['numero' => '25', 'estado' => 'libre',]);
        Espacio::create(['numero' => '26', 'estado' => 'libre',]);
        Espacio::create(['numero' => '27', 'estado' => 'libre',]);
        Espacio::create(['numero' => '28', 'estado' => 'libre',]);
        Espacio::create(['numero' => '29', 'estado' => 'libre',]);
        Espacio::create(['numero' => '30', 'estado' => 'libre',]);
        Espacio::create(['numero' => '31', 'estado' => 'libre',]);
        Espacio::create(['numero' => '32', 'estado' => 'libre',]);
        Espacio::create(['numero' => '33', 'estado' => 'libre',]);
        Espacio::create(['numero' => '34', 'estado' => 'libre',]);
        Espacio::create(['numero' => '35', 'estado' => 'libre',]);
        Espacio::create(['numero' => '36', 'estado' => 'libre',]);
        Espacio::create(['numero' => '37', 'estado' => 'libre',]);
        Espacio::create(['numero' => '38', 'estado' => 'libre',]);
        Espacio::create(['numero' => '39', 'estado' => 'libre',]);
        Espacio::create(['numero' => '40', 'estado' => 'libre',]);
        Espacio::create(['numero' => '41', 'estado' => 'libre',]);
        Espacio::create(['numero' => '42', 'estado' => 'libre',]);
        Espacio::create(['numero' => '43', 'estado' => 'libre',]);
        Espacio::create(['numero' => '44', 'estado' => 'libre',]);
        Espacio::create(['numero' => '45', 'estado' => 'libre',]);
        Espacio::create(['numero' => '46', 'estado' => 'libre',]);
        Espacio::create(['numero' => '47', 'estado' => 'libre',]);
        Espacio::create(['numero' => '48', 'estado' => 'libre',]);
        Espacio::create(['numero' => '49', 'estado' => 'libre',]);
        Espacio::create(['numero' => '50', 'estado' => 'libre',]);

        //Tarifas por hora
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '1', 'costo' => '5', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '2', 'costo' => '10', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '3', 'costo' => '15', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '4', 'costo' => '20', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '5', 'costo' => '25', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '6', 'costo' => '30', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '7', 'costo' => '35', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '8', 'costo' => '40', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '9', 'costo' => '45', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '10', 'costo' => '50', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '11', 'costo' => '55', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '12', 'costo' => '60', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '13', 'costo' => '65', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '14', 'costo' => '70', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '15', 'costo' => '75', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '16', 'costo' => '80', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '17', 'costo' => '85', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '18', 'costo' => '90', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '19', 'costo' => '95', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '20', 'costo' => '100', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '21', 'costo' => '105', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '22', 'costo' => '110', 'minutos_de_gracia' => '30']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_hora', 'cantidad' => '23', 'costo' => '115', 'minutos_de_gracia' => '30']);

        //Tarifas por dia
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '1', 'costo' => '50', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '2', 'costo' => '100', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '3', 'costo' => '150', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '4', 'costo' => '200', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '5', 'costo' => '250', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '6', 'costo' => '300', 'minutos_de_gracia' => '720']);
        Tarifa::create(['nombre' => 'regular', 'tipo' => 'por_dia', 'cantidad' => '7', 'costo' => '350', 'minutos_de_gracia' => '720']);

        //cliente 1 y su vehiculo
        $cliente1 = Cliente::create([
            'nombres' => 'Maria Elena Rodriguez Vega',
            'numero_documento' => '8108618',
            'email' => 'maria@gmail.com',
            'celular' => '76658534',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente1->id,
            'placa' => '123-ABC',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'color' => 'Rojo',
            'tipo' => 'auto',
        ]);

        //cliente 2 y su vehiculo
        $cliente2 = Cliente::create([
            'nombres' => 'Carlos Antonio Medez Silva',
            'numero_documento' => '8108619',
            'email' => 'carlos@gmail.com',
            'celular' => '76658535',
            'genero' => 'Masculino',
            'estado' => true,
        ]);
        Vehiculo::create([
            'cliente_id' => $cliente2->id,
            'placa' => '456-DEF',
            'marca' => 'Honda',
            'modelo' => 'Civic',
            'color' => 'Azul',
            'tipo' => 'auto',
        ]);

        //cliente 3 y su vehiculo
        $cliente3 = Cliente::create([
            'nombres' => 'Ana Patricia Flores Mamani',
            'numero_documento' => '8108620',
            'email' => 'ana@gmail.com',
            'celular' => '76658536',
            'genero' => 'Femenino',
            'estado' => true,
        ]);
        Vehiculo::create([
            'cliente_id' => $cliente3->id,
            'placa' => '789-GHI',
            'marca' => 'Ford',
            'modelo' => 'Focus',
            'color' => 'Blanco',
            'tipo' => 'auto',
        ]);

        //cliente 4 y su vehiculo
        $cliente4 = Cliente::create([
            'nombres' => 'Roberto Luis Torrez Gutierrez',
            'numero_documento' => '8108621',
            'email' => 'luis@gmail.com',
            'celular' => '76658537',
            'genero' => 'Masculino',
            'estado' => true,
        ]);
        Vehiculo::create([
            'cliente_id' => $cliente4->id,
            'placa' => '012-JKL',
            'marca' => 'Chevrolet',
            'modelo' => 'Cruze',
            'color' => 'Negro',
            'tipo' => 'auto',
        ]);

        //cliente 5 y su vehiculo
        $cliente5 = Cliente::create([
            'nombres' => 'Carmen Rosa Quispe Condori',
            'numero_documento' => '8108622',
            'email' => 'carme@gmail.com',
            'celular' => '76658538',
            'genero' => 'Femenino',
            'estado' => true,
        ]);
        Vehiculo::create([
            'cliente_id' => $cliente5->id,
            'placa' => '893-GNR',
            'marca' => 'Chevrolet',
            'modelo' => 'Cruze',
            'color' => 'Negro',
            'tipo' => 'auto',
        ]);
    }
}
