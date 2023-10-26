<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('welcome');
    }
    public function endereco(){
        $endereco = Endereco::all();
    
        return view('endereco', compact('endereco'));
    }
    public function cliente(){
        $cliente = Cliente::all();
        return view('cliente', compact('cliente'));
    }
    public function criar(Request $request){
        $endereco = new Endereco();
        $endereco->cep = $request->input('cep');
        $endereco->uf = $request->input('uf');
        $endereco->cidade = $request->input('cidade');
        $endereco->bairro = $request->input('bairro');
        $endereco->rua = $request->input('rua');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->save();

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->endereco_id = $endereco->id;
        $cliente->save();
    }
}
