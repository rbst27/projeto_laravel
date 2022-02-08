<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_cliente',
        'valor'
    ];

    public function vendas()
    {
        return $this->belongsToMany('\App\Models\Venda','venda_cliente')->withPivot('id_pedido','id_venda');
    }

}
