<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Produto;
use App\Cart;
use App\Compra;
use App\User;
use Auth;
use Session;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::guest()){
              $registros = Produto::all();

              return view('home.index', compact('registros'));
        }else{
          if(Auth::user()->type == 2 || Auth::user()->type ==3 ){
              return redirect()->route('produtos.index');
          }
        }
        $registros = Produto::all();

        return view('home.index', compact('registros'));
    }

    public function produto($id = null)
    {
        if( !empty($id) ) {
            $registro = Produto::where([
                'id'    => $id])->first();

            if( !empty($registro) ) {
                return view('home.produto', compact('registro'));
            }
        }
        return redirect()->route('inicio.index');
    }

    public function addCart(Request $request, $id){

    $produto = Produto::find($id);
     $oldCart = Session::has('cart') ? Session::get('cart') : null;
     $cart = new Cart($oldCart);
     $cart->add($produto, $produto->id);

     $request->session()->put('cart', $cart);
     //dd($request->session->get('cart'));
     $request->session()->flash('admin-mensagem-sucesso', 'Produto adicionado ao carrinho!');

     return redirect()->route('inicio.index');


   }

   public function getCart(){
       if (!Session::has('cart')) {
           return view('carrinho.shoppingCart');
       }

       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       return view('carrinho.shoppingCart', ['produtos' => $cart->itens, 'totalPreco' => $cart->total]);
   }

}
