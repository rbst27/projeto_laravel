<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_produto',
        'valor',
        'quatidade'
    ];

    public function pedidos()
    {
        return $this->belongsToMany('\App\Models\Venda','venda_cliente')->withPivot('id_pedido','id_venda');
    }
}
