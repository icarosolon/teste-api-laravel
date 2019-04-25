<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class MCFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dados = Clientes::all();
        return json_encode($dados);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $registro = new Clientes();

        $registro->nome = $dados['name'];
        $registro->dt_nasc = $dados['dt_nasc'];

        if ($dados['sexo'] == 'M') {
            return response('So salva mulher', 406)
                ->header('Content-Type', 'text/plain');
        }

        $registro->sexo = $dados['sexo'];

        $registro->save();

        return response('Gravado com Sucesso!', 201)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Clientes::find($id);
        return json_encode($dados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       //

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
        
        $dados = Clientes::find($id);

        if(empty($dados)){
            return response('ID não encontrada', 403)
                    ->header('Content-Type', 'text/plain');
        }

        $novos_dados = $request->all();
        //dd($novos_dados);
        if ($novos_dados['sex'] == '' or $novos_dados['name'] == '' or $novos_dados['dt_nasc'] == '') {
            return response('Faltando Dado', 406)
                ->header('Content-Type', 'text/plain');
        }

        $dados->nome = $novos_dados['name'];
        $dados->sexo = $novos_dados['sex'];
        $dados->dt_nasc = $novos_dados['dt_nasc'];
        $dados->save();

        return response('ID editada com Sucesso!', 200)
            ->header('Content-Type', 'text/plain');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Clientes::find($id);
        
        if(empty($dados)){
            return response('ID não encontrada', 403)
                    ->header('Content-Type','text/plain');
        }
        $dados->delete();

        return response('Deletado com sucesso', 406)
            ->header('Content-Type', 'text/plain');

    }
}
