<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new Contact();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 94948787';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo = 1;
        // $contato->mensagem = 'Seja bem vindo ao sistema super getsão';
        // $contato->save();

        factory(Contact::class, 100)->create();
    }
}
