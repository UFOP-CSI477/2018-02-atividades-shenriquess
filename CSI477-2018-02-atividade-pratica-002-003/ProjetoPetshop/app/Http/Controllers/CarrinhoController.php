<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produto;
use App\Carrinho;
use App\Compra;
use Session;


class CarrinhoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function postCarrinho(Request $request){
       if (!Session::has('carrinho')){
         return redirect()->route('produto.itensCarrinho');
       }

       $oldCarrinho = Session::get('carrinho');
       $carrinho = new Carrinho($oldCarrinho);

       $aux = $carrinho->itens;
       foreach ($aux as $a) {
             $compra = new Compra();
             $compra->quantidade = $a['qtd'];
             $compra->data=$data = date('Y-m-d H:i:s');
             $compra->user_id= Auth::user()->id;
             $compra->produto_id = $a['id_prod'];

             $compra->save();

       }
       session()->flash('mensagem-compra', 'Compra Realizada!');
       Session::forget('carrinho');
       return redirect()->route('inicio.index');
     }

    }
