<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item() {
                    //Pertence A              <fk>        <pk>
        return $this->belongsTo('App\Item', 'produto_id', 'id');

    }
}
