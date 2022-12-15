<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{    
    /*
        public function index(){
            $fornecedores = [ 
                0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'cnpj' => '0', 'ddd' => '11', 'telefone' => '0000-000'],
                1 => ['nome' => 'Fornecedor 2', 'status' => 'N', 'cnpj' => null, 'ddd' => '85', 'telefone' => '0000-000'],
                2 => ['nome' => 'Fornecedor 3', 'status' => 'N', 'cnpj' => null, 'ddd' => '32', 'telefone' => '0000-000']
            ];

            condição ? se verdade : se falso;
            condição ? se verdade : (condição ? se verdade : se falso);
            return view('app.fornecedor.index', compact('fornecedores'));
        }
    */
    public function index($msg='') {
        return view('app.fornecedor.index', ['msg' => $msg]);
    }
    
    public function listar(Request $request) {
        
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);
        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request, $msg = ''){
        
        if($request->input('_token') != "" && $request->input('id') == "") {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' =>  'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback =[
                'required' => 'O campo :attribute precisa ser preenchido.',
                'email' => 'O campo e-mail não foi preenchido corretamente',
                'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo deve ter no máximo 2 caracteres',
                'uf.max' => 'O campo deve ter no máximo 2 caracteres',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "Cadastro realizado com sucesso!!";
        }

        if($request->input('_token') != "" && $request->input('id') != ""){
            $fornecedor = Fornecedor::find($request->input("id"));

            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            } else{
                $msg = 'Erro ao tentar atualizar o registro!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input("id"), 'msg' => $msg]);

        }

        return view ('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
    
    public function excluir($id, $msg = '') {
        Fornecedor::find($id)->delete();
        $msg = "Fornecedor excluído com sucesso!";
        return redirect()->route('app.fornecedor', ['msg' => $msg]);
    }
}
