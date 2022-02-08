<?php

namespace App\Http\Controllers;
use App\Models\Pedido;

use Illuminate\Http\Request;

class TaskPedidos extends Controller
{
    public function index()
    {
        $pedidos =Pedido::All();

        return view('pedidos.lista', ['pedidos'=> $pedidos]);
    }

    public function create()
    {
        return view('pedidos.cadastrar');
    }

}
