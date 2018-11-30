<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produto;
use App\Cart;
use App\Compra;
use Session;


class CarrinhoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function postCart(Request $request){
       if (!Session::has('cart')){
         return redirect()->route('produto.shoppingCart');
       }

       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);

       $aux = $cart->itens;
       foreach ($aux as $a) {
             $compra = new Compra();
             $compra->quantidade = $a['qtd'];
             $compra->data=$data = date('Y-m-d H:i:s');
             $compra->user_id= Auth::user()->id;
             $compra->produto_id = $a['id_prod'];

             $compra->save();

       }
       Session::forget('cart');
       return redirect()->route('inicio.index')->with( 'success' , 'Compra Realizada');
     }




     public function cancelCart(Request $request){
        if (!Session::has('cart')){
          return redirect()->route('produto.shoppingCart');
        }

        Session::forget('cart');
        return redirect()->route('inicio.index')->with( 'success' , 'Compra Cancelada');
      }

    }
