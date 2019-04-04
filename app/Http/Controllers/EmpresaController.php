<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Rules\Cnpj;
use App\Rules\Telefone;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::get(['id', 'nome', 'cnpj']);
        return view('empresa', compact(['empresas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'cnpj'                  => ['required', 'string', 'size:18', 'unique:empresas', new Cnpj],
            'razao_social'          => 'required|string',
            'nome'                  => 'string',
            'cep'                   => 'required|numeric|digits:8',
            'logradouro'            => 'required|string',
            'numero'                => 'required|string',
            'telefone'              => ['required', 'string', 'min:10', 'max:11', new Telefone],
            'email'                 => 'required|email',
            'bairro'                => 'required|string',
            'cidade'                => 'required|string',
            'estado'                => 'required|size:2',
            'segmento'              => 'required',
            'inscricao_municipal'   => 'required|string',
        ]);

        Empresa::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empresa::find($id);
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

        $request->validate([
            'cnpj'                  => ['required', 'string', 'size:18', 'unique:empresas', new Cnpj],
            'razao_social'          => 'required|string',
            'nome'                  => 'string',
            'cep'                   => 'required|numeric|digits:8',
            'logradouro'            => 'required|string',
            'numero'                => 'required|string',
            'telefone'              => ['required', 'string', 'min:10', 'max:11', new Telefone],
            'email'                 => 'required|email',
            'bairro'                => 'required|string',
            'cidade'                => 'required|string',
            'estado'                => 'required|size:2',
            'segmento'              => 'required',
            'inscricao_municipal'   => 'required|string',
        ]);

        Empresa::find($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::find($id)->delete();
        return redirect()->back();
    }

    public function buscaCnpj($cnpj)
    {
        $url = "https://www.receitaws.com.br/v1/cnpj/" . $cnpj;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function buscaCep($cep)
    {
        $url = "https://viacep.com.br/ws/".$cep."/json/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
}
