<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Carrinho;
use App\Compra;
use Auth;
use Session;
use DB;

class ProdutoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = Produto::all();
        return view('admin.index', compact('produtos'));
    }

    public function adicionar()
    {
        return view('admin.adicionar');
    }

    public function editar($id)
    {
        $registro = Produto::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('produtos,index');
        }
        return view('admin.editar', compact('registro'));
    }

    public function salvar(Request $req)
    {
      $user = auth()->user();
      $dados = $req->all();

      if($req->hasFile('imagem') && $req->file('imagem')->isValid()) {

        $nome = rand(100000, 999999);

        $extenstion = $req->imagem->extension();
        $nameFile = "{$nome}.{$extenstion}";
        $dados['imagem'] = $nameFile;

        $upload = $req->imagem->storeAs('imagens',$nameFile);
        //$imagem = new \stdClass();//instanciando
        //$imagem->filePath = $nome;

        //$file->move(public_path().'/images/', $nome);
        if(!$upload){
          return redirect()
                      ->back()
                      ->with('error','Falha ao fazero upload da imagem');
                    }

      }
        Produto::create($dados);
        $req->session()->flash('admin-mensagem-sucesso', 'Produto cadastrado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function atualizar(Request $req, $id)
    {
      $user = auth()->user();
      $dados = $req->all();

      if($req->hasFile('imagem') && $req->file('imagem')->isValid()) {

        $nome = rand(100000, 999999);

        $extenstion = $req->imagem->extension();
        $nameFile = "{$nome}.{$extenstion}";
        $dados['imagem'] = $nameFile;

        $upload = $req->imagem->storeAs('imagens',$nameFile);
        //$imagem = new \stdClass();//instanciando
        //$imagem->filePath = $nome;

        //$file->move(public_path().'/images/', $nome);
        if(!$upload){
          return redirect()
                      ->back()
                      ->with('error','Falha ao fazero upload da imagem');
                    }

        }

        Produto::find($id)->update($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function deletar($id)
    {
         $compras = Compra::where([
             'produto_id'    => $id])->first();
        if(empty($compras)){
          Produto::find($id)->delete();
          session()->flash('admin-mensagem-sucesso', 'Produto excluído com sucesso!');
        }
        else{
          session()->flash('admin-mensagem-sucesso', 'Não é possível excluir o produto!');
        }
        return redirect()->route('produtos.index');
    }
}
