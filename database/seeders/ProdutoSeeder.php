<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        /* $produto = new Produto();
        $produto->nome = 'Geladeira';
        $produto->descricao = 'Geladeira/Refrigerador frost free 375 litros';
        $produto->peso = 60;
        $produto->unidade_id = 1;
        $produto->preco_compra = 2500.00;
        $produto->save();

        $produto1 = new Produto();
        $produto1->nome = 'Smart TV';
        $produto1->descricao = 'LG NANO65 4K 65 polegadas';
        $produto1->peso = 20;
        $produto1->unidade_id = 1;
        $produto1->preco_compra = 4300.00;
        $produto1->save(); */

        Produto::factory()->count(3)->create();
    }
}
