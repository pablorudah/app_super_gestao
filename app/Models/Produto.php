<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){

        //Produto tem 1 ProdutoDetalhe

        /* 
            O Eloquent ORM irá conferir o registro de 1 Produto
            relacionado em ProdutoDetalhe, através da chave estrangeira (fk - foreign key)
        */
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }
}
