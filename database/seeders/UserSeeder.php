<?php

namespace Database\Seeders;

use App\Models\Empresas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::create([
            'name'     => 'Administrador do Sistema',
            'cnpj'     => '00000000000',
        ]);

        Empresas::create([
            'name'     => 'WHB Automotive S.A',
            'cnpj'     => '12345678910',
            'endereco' => 'Rua Wiegand 1600',
        ]);

        Empresas::create([
            'name'     => 'Sony',
            'cnpj'     => '12345678911',
            'endereco' => 'New York, Times Square',
        ]);

        Empresas::create([
            'name'     => 'Microsoft',
            'cnpj'     => '12345678912',
            'endereco' => 'Canadá',
        ]);

        User::create([
            'empresa_id' => '1',
            'name'       => 'Administrador',
            'email'      => 'admin@admin.com',
            'sysadm'     => true,
            'admin'      => false,
            'func'       => false,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '2',
            'name'       => 'Gustavo Quenupe Lobo',
            'matricula'  => '010446',
            'email'      => 'gustavoqe.75@gmail.com',
            'sysadm'     => false,
            'admin'      => true,
            'func'       => false,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '2',
            'name'       => 'Matheus Tosta',
            'matricula'  => '010445',
            'email'      => 'matheus@gmail.com',
            'sysadm'     => false,
            'admin'      => false,
            'func'       => true,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '3',
            'name'       => 'João Felipe da Rosa',
            'matricula'  => '010446',
            'email'      => 'joaofr@gmail.com',
            'sysadm'     => false,
            'admin'      => true,
            'func'       => false,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '3',
            'name'       => 'Maycon Douglas',
            'matricula'  => '010445',
            'email'      => 'maycon@gmail.com',
            'sysadm'     => false,
            'admin'      => false,
            'func'       => true,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '4',
            'name'       => 'Alexandre',
            'matricula'  => '010446',
            'email'      => 'alexandre@gmail.com',
            'sysadm'     => false,
            'admin'      => true,
            'func'       => false,
            'password'   => bcrypt('1234'),
        ]);

        User::create([
            'empresa_id' => '4',
            'name'       => 'Leonardo',
            'matricula'  => '010445',
            'email'      => 'leonardo@gmail.com',
            'sysadm'     => false,
            'admin'      => false,
            'func'       => true,
            'password'   => bcrypt('1234'),
        ]);
    }
}
