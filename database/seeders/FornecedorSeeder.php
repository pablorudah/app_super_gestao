<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Criando registro inicial instanciando um objeto
        /*$fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Inicial';
        $fornecedor->site = 'fornecedorinicial.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'contato@fornecedor_inicial.com.br';
        $fornecedor->save(); */

        //Criando registro inicial com o método create da Model Fornecedor
        /*Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br',
        ]); */

        //Criando registro inicial com o método DB da facade DB
        /*DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'RJ',
            'email' => 'contato@fornecedor300.com.br',
        ]); */

        Fornecedor::factory()->count(20)->create();
    }
}
