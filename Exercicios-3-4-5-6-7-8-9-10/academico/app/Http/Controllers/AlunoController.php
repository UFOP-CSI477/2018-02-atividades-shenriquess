<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Cidade;

class AlunoController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alunos = Aluno::all();
        return view('alunos.index')->with('alunos', $alunos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cidades = Cidade::orderBy('nome')->get();
        return view('alunos.create',['cidades' => $cidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Aluno::create($request->all());
        return redirect('/alunos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
          return view('alunos.show') ->with('aluno', $aluno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        //
        $cidades = Cidade::orderBy('nome')->get();
        return view('alunos.edit',['aluno' => $aluno, 'cidades' => $cidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
        $aluno->fill($request->all());
        $aluno->save();

        return redirect()->route('alunos.show',$aluno->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
        $aluno->delete();
        session()->flash('mensagem','Aluno Excluído com sucesso');
        return redirect()->route('alunos.index');
    }
}
