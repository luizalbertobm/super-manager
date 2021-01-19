<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactReason;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // echo $request->input('nome');

        // $contato = new Contact();
        // $contato->create($request->all());
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo = $request->input('motivo');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        $motivos = ContactReason::all();
        return view('site.contact', ['motivos' => $motivos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:contacts',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute não pode estar vazio',
            'email' => 'O email informado não é válido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
        ];
        $request->validate($regras,$feedback);

        Contact::create($request->all());
        return redirect()->route('site.index');
    }
}
