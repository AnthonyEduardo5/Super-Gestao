<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('motivo_contato');
        */

        
        /*
        --TRATAMENTO INDUVIDUAL DE CADA INPUT ATRIBUINDO AOS CAMPOS DA TABELA--

        ==================================================================

        $contato = new SiteContato();
        $contato -> nome = $request->input('nome');
        $contato -> telefone = $request->input('telefone');
        $contato -> email = $request->input('email');
        $contato -> motivo_contato = $request->input('motivo_contato');
        $contato -> mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

        /*
        1º --EXECUÇÃO DO MÉTODO FILL APENAS SE O REQUEST NÃO ESTIVER VAZIO--
        2º --O FILLABLE NECESSITA ESTAR DEFINIDO PARA QUE O FILL SEJA EXECUTADO--

        ==================================================================

        if((!empty($request->all()))){
            $contato = new SiteContato();
            $contato->fill($request->all());
            $contato->save();
        }
        */

        /*
        1º --EXECUÇÃO DO MÉTODO CREATE APENAS SE O REQUEST NÃO ESTIVER VAZIO--
        2º --O FILLABLE NECESSITA ESTAR DEFINIDO PARA QUE O CREATE SEJA EXECUTADO--

        ============================================================================
        
        if((!empty($request->all()))){
            $contato = new SiteContato();
            $contato->create($request->all());
        }
        */

 
        //print_r($contato->getAttributes());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
        
    }

    public function salvar (Request $request){
        //realizar a validação dos campos preenchidos
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedbacks = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já esta em uso',
            'telefone.required' => 'O campo precisa ser preenchido', 

            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate( $regras, $feedbacks);
        
        if((!empty($request->all()))){
            SiteContato::create($request->all());
            return redirect()->route('site.index');

        }

    }
}
