<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso','unidade_id'];    

    public function ProdutoDetalhe() {
                    //Tem UM
        return $this->hasOne('App\ProdutoDetalhe');
        /*
        O model estabelece uma relação da tabela mais forte com a tabela mais fraca
        e busca por meio do model tabela mais fraca o registro no banco de dados atraves da comparação da FK com PK
        */

        //Produto tem 1 produtoDetalhe

        //1 registro relacionada em preduto_detalhes (fk) -> produto_id
        //produto (pk) -> id
    }
}
