<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        //return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Produto', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at');
        /*
            1 - Representa a segunda tabela que faz parte do relacionamento NxN
            2 - Nome da tabela auxiliar que recebe os dados do relacionamento
            3 - Representa a FK do model(tabela) em que colocamos o codigo do relacionamento
            4 - Representa a FK da segunda tabela que faz parte do relacionamento

        */
    }
}
