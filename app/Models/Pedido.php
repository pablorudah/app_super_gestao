<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        //return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');

        return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');

        /* 
            1º parametro: Modelo de relacionamento N x N em relação ao Model que estamos implementando

            2º parametro: É a tabela auxiliar que armazena os registros de relacionamento entre os Models

            3º parametro: Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento

            4º parametro: Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que 
            estamos implementando
        */
    }
}
