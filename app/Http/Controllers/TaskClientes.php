<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class TaskClientes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes =Cliente::All();

        return view('clientes.lista', ['cliente'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body=$request->all(); 
        $cliente=new Cliente;
        $cliente["nome"] = $body["nome"]; 
        $cliente["email"]=$body["email"];
        $cliente["cpf"]=$body["cpf"];

      if(empty($cliente["nome"])){
      
        
       
      }elseif(empty($cliente["email"])){
       
       
      }elseif(empty($cliente["cpf"])){     
        


      }else{
          $cliente->save();
          return redirect('/cliente-cadastrar');
      }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.cadastrar', ['cliente'=>$cliente]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nome=$request->input('nome', $cliente->nome);
        $cliente->email=$request->input('email',$cliente->email);
        $cliente->cpf=$request->input('cpf',$cliente->cpf);
        $cliente->save();
        return redirect('/cliente-cadastrar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $cliente = Cliente::find($id);
        $cliente->delete();
        $clientes =Cliente::All();
        return view('clientes.lista', ['cliente'=>$clientes]);

    }
}
