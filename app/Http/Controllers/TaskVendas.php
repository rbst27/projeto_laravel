<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Pedido;

class TaskVendas extends Controller
{
    public function index($pedido)
    {
        
        $all_vendas= Vendas::whereHas('pedidos', function ($query)
        { 
            $query->where('id_pedido','=',$pedido);
        })->with('pedidos')->get();

        return view('vendas.lista', ['vendas'=> $all_vendas]);

    }

    public function store(Request $request)
    {
           
          
    }


}
