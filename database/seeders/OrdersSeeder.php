<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\Setores;
use App\Models\TiposSolic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposSolic::create([
            'empresa_id' => '2',
            'type' => 'Liberação de Wi-Fi',
        ]);

        TiposSolic::create([
            'empresa_id' => '2',
            'type' => 'Liberação de Limite de Impressão',
        ]);

        TiposSolic::create([
            'empresa_id' => '2',
            'type' => 'Liberação de Impressão Colorida',
        ]);

        Setores::create([
            'empresa_id' => '2',
            'setor' => 'Informática',
        ]);

        Setores::create([
            'empresa_id' => '2',
            'setor' => 'Qualidade',
        ]);

        Setores::create([
            'empresa_id' => '2',
            'setor' => 'Produção',
        ]);

        TiposSolic::create([
            'empresa_id' => '3',
            'type' => 'Alteração Cadastral',
        ]);

        TiposSolic::create([
            'empresa_id' => '3',
            'type' => 'Alteração de e-mail',
        ]);

        TiposSolic::create([
            'empresa_id' => '3',
            'type' => 'Limite de caixa de e-mail',
        ]);

        Setores::create([
            'empresa_id' => '3',
            'setor' => 'Diretoria',
        ]);

        Setores::create([
            'empresa_id' => '3',
            'setor' => 'Engenharia',
        ]);

        Setores::create([
            'empresa_id' => '3',
            'setor' => 'Logistica',
        ]);

        TiposSolic::create([
            'empresa_id' => '3',
            'type' => 'Desenvolvimento de Novo Projeto',
        ]);

        TiposSolic::create([
            'empresa_id' => '4',
            'type' => 'Solicitação de Compra',
        ]);

        TiposSolic::create([
            'empresa_id' => '4',
            'type' => 'Solicitação de Recurso Tecnológico',
        ]);

        Setores::create([
            'empresa_id' => '4',
            'setor' => 'Recursos Humanos',
        ]);

        Setores::create([
            'empresa_id' => '4',
            'setor' => 'Gestão Ambiental',
        ]);

        Setores::create([
            'empresa_id' => '4',
            'setor' => 'Fiscal',
        ]);

        for ($i = 0; $i < 15; $i++) {
            $rand = rand(1, 3);
            if ($rand == 1) {
                $sit = 'P';
                $accptby = null;
                $accptin = null;
            } else if ($rand == 2) {
                $sit = 'R';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            } else {
                $sit = 'A';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            }
            $expiresat = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);

            Orders::create([
                'empresa_id'  => '2',
                'user_id'     => '3',
                'setor_id'    => rand(1, 3),
                'tipo_id'     => rand(1, 3),
                'situation'   => $sit,
                'description' => 'Descrição da atividade.',
                'expires_at'  => $expiresat,
                'accepted_by' => $accptby,
                'accepted_in' => $accptin,
            ]);    
        }

        for ($i = 0; $i < 15; $i++) {
            $rand = rand(1, 3);
            if ($rand == 1) {
                $sit = 'P';
                $accptby = null;
                $accptin = null;
            } else if ($rand == 2) {
                $sit = 'R';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            } else {
                $sit = 'A';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            }
            $expiresat = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);

            Orders::create([
                'empresa_id'  => '3',
                'user_id'     => '5',
                'setor_id'    => rand(4, 6),
                'tipo_id'     => rand(4, 6),
                'situation'   => $sit,
                'description' => 'Descrição da atividade.',
                'expires_at'  => $expiresat,
                'accepted_by'  => $accptby,
                'accepted_in'  => $accptin,
            ]);    
        }

        for ($i = 0; $i < 15; $i++) {
            $rand = rand(1, 3);
            if ($rand == 1) {
                $sit = 'P';
                $accptby = null;
                $accptin = null;
            } else if ($rand == 2) {
                $sit = 'R';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            } else {
                $sit = 'A';
                $accptby = '2';
                $accptin = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);
            }
            $expiresat = '2022-'. str_pad(rand(1, 12), '2', '0', STR_PAD_LEFT) .'-'. str_pad(rand(1, 31), '2', '0', STR_PAD_LEFT) .' '. str_pad(rand(0, 23), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT) .':'. str_pad(rand(0, 59), '2', '0', STR_PAD_LEFT);

            Orders::create([
                'empresa_id'  => '4',
                'user_id'     => '7',
                'setor_id'    => rand(7, 9),
                'tipo_id'     => rand(7, 9),
                'situation'   => $sit,
                'description' => 'Descrição da atividade.',
                'expires_at'  => $expiresat,
                'accepted_by'  => $accptby,
                'accepted_in'  => $accptin,
            ]);    
        }
    }
}
