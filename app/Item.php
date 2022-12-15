<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso','unidade_id', 'fornecedor_id'];    

    public function itemDetalhe() {
                    //Tem UM                       <fk>       <pk>
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
        /*
        O model estabelece uma relação da tabela mais forte com a tabela mais fraca
        e busca por meio do model tabela mais fraca o registro no banco de dados atraves da comparação da FK com PK
        */

        //Produto tem 1 produtoDetalhe

        //1 registro relacionada em preduto_detalhes (fk) -> produto_id
        //produto (pk) -> id
    }

    public function fornecedor() {
        return $this->belongsTo('App\Fornecedor');
    }
}
