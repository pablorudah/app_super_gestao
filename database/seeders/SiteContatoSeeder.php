<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 99999-8888';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $contato->save();

        $contato1 = new SiteContato();
        $contato1->nome = 'SuporteSG';
        $contato1->telefone = '(11) 3215-1596';
        $contato1->email = 'suporte@sg.com.br';
        $contato1->motivo_contato = 2;
        $contato1->mensagem = 'Atendimento ao cliente da Super Gestão';
        $contato1->save();

        $contato2 = new SiteContato();
        $contato2->nome = 'FinanceiroSG';
        $contato2->telefone = '(11) 3215-1596';
        $contato2->email = 'financeiro@sg.com.br';
        $contato2->motivo_contato = 1;
        $contato2->mensagem = 'Contato do departamento financeiro da Super Gestão';
        $contato2->save();
        */

        SiteContato::factory()->count(100)->create();
    }
}
