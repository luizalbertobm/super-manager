<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use FornecedorSeeder;
use Illuminate\Http\Request;
use League\Flysystem\Plugin\ForcedCopy;

class SupplierController extends Controller
{
    public function index()
    {
        return view('app.supplier.index');
    }

    public function list(Request $request)
    {
        $suppliers = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(2);

        // dd($suppliers);
        return view('app.supplier.list', [
            'suppliers' => $suppliers,
            'request' => $request->all()
        ]);
    }

    public function add(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no mínimo 3 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente',
            ];
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $supplier = Fornecedor::find($request->input('id'));
            $update = $supplier->update($request->all());

            if($update){
                $msg = 'Update realizado com sucesso';
            }else{
                $msg ='Update com problema';
            }
        }

        return view('app.supplier.add', ['msg' => $msg]);
    }

    public function edit($id)
    {
        $supplier = Fornecedor::find($id);
        return view('app.supplier.add', [
            'supplier' => $supplier
        ]);
    }


    public function remove($id)
    {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.supplier');
    }
}
