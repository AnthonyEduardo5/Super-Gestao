<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//fornecedors
//fornecedores

class Fornecedor extends Model
{
    use SoftDeletes;
    //força a mudança do nome da tabela para os dados serem salvos pelo Tinker
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() {
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
