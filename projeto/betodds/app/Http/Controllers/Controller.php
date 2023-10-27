<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

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
        $cliente = DB::table('cliente')
        ->join('endereco', 'endereco.id', '=', 'cliente.endereco_id')
        ->select('cliente.id', 'cliente.nome', 'cliente.email', 'cliente.telefone', 'cliente.cpf', 'endereco.cep', 'endereco.uf', 'endereco.cidade', 'endereco.bairro', 'endereco.rua', 'endereco.numero', 'endereco.complemento')
        ->get();
        return view('cliente', compact('cliente'));
    }
    public function editar($id){
        $cliente = DB::table('cliente')
        ->join('endereco', 'endereco.id', '=', 'cliente.endereco_id')
        ->select('cliente.id', 'cliente.nome', 'cliente.email', 'cliente.telefone', 'cliente.cpf', 'endereco.cep', 'endereco.uf', 'endereco.cidade', 'endereco.bairro', 'endereco.rua', 'endereco.numero', 'endereco.complemento')
        ->where('cliente.id',$id)
        ->get();
        return view('editar', compact('cliente'));
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

        return redirect()->route('cliente')->with('success','Cadastrado com sucesso');
    }
    public function update(Request $request,$id){
        $cliente = Cliente::find($id);
        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->update();

        $endereco = Endereco::find($cliente->endereco_id);
        $endereco->cep = $request->input('cep');
        $endereco->uf = $request->input('uf');
        $endereco->cidade = $request->input('cidade');
        $endereco->bairro = $request->input('bairro');
        $endereco->rua = $request->input('rua');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->update();

        return redirect()->route('cliente')->with('success','Atualizado com sucesso');

    }
    public function deletar($id){
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cliente')->with('danger','Delete com sucesso');

    }
}
