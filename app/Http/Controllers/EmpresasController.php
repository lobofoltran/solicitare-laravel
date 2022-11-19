<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEmpresasFormRequest;
use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller
{
    public function show()
    {
        return view('empresas.index', [
            'empresas' => DB::table('empresas')->get(),
        ]);
    }

    public function store(StoreUpdateEmpresasFormRequest $request)
    {
        $setores = new Empresas;

        $setores->cnpj     = $request->cnpj;
        $setores->name     = $request->name;
        $setores->endereco = $request->endereco;
        $setores->save();

        return redirect()->route('empresas.index');
    }

    public function edit($id)
    {
        if (!$empresas = Empresas::find($id)) {
            return redirect()->route('empresas.index');
        }

        return view('empresas.edit', [
            'empresas' => $empresas
        ]);
    }

    public function update(StoreUpdateEmpresasFormRequest $request, $id)
    {
        if (!$empresas = Empresas::find($id)) {
            return redirect()->route('empresas.index');
        }

        $empresas->cnpj     = $request->cnpj;
        $empresas->name     = $request->name;
        $empresas->endereco = $request->endereco;
        $empresas->save();

        return redirect()->route('empresas.index');
    }

    public function destroy($id)
    {
        if (!$empresas = Empresas::find($id)) {
            return redirect()->route('empresas.index');
        }

        $empresas->delete();

        return redirect()->route('empresas.index');
    }
}
