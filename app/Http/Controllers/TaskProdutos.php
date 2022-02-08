<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class TaskProdutos extends Controller
{
   
    public function index()
    {
        $produtos =Produto::All();

        return view('produtos.lista', ['produtos'=> $produtos]);
    }

    public function store(Request $request)
    {
        $body=$request->all(); 
        $produto=new Produto;
        $produto["nome"] = $body["nome"]; 
        $valor= str_replace(",",".",$body["valor"]);
        $produto["valor"]= $valor;
        $produto["quantidade"]=$body["quantidade"];

    
          $produto->save();
          return redirect('/produto-cadastrar');
     
          
    }
       
    public function create()
    {
        return view('produtos.cadastrar');
    }
     
    public function edit($id)
    {
        $produto = Produto::find($id);
        $produto->valor =str_replace(".",",",$produto->valor);
        return view('produtos.cadastrar', ['produto'=>$produto]);

    }


    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->nome=$request->input('nome', $produto->nome);
        $produto->valor=$request->input('valor',$produto->valor);
        $produto->quantidade=$request->input('quantidade',$produto->quatidade);
        $produto->save();
        return redirect('/produto-cadastrar');
    }

    public function destroy($id)
    {
             

            $produto = Produto::find($id);
            $produto->delete();
           
            return redirect('/listar-produtos');
                  
           

    }
}
