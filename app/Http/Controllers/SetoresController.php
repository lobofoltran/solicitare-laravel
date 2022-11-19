<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSetoresFormRequest;
use App\Models\Setores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetoresController extends Controller
{
    public function show()
    {
        return view('setores.index', [
            'setores' => DB::table('setores')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
        ]);
    }

    public function store(StoreUpdateSetoresFormRequest $request)
    {
        $setores = new Setores;

        $setores->empresa_id = Auth::user()->empresa_id;
        $setores->setor      = $request->setor;
        $setores->save();

        return redirect()->route('setores.index');
    }

    public function edit($id)
    {
        if (!$setor = Setores::find($id)) {
            return redirect()->route('setores.index');
        }

        return view('setores.edit', [
            'setor' => $setor
        ]);
    }

    public function update(StoreUpdateSetoresFormRequest $request, $id)
    {
        if (!$setor = Setores::find($id)) {
            return redirect()->route('setores.index');
        }

        $setor->setor = $request->setor;
        $setor->save();

        return redirect()->route('setores.index');
    }

    public function destroy($id)
    {
        if (!$setor = Setores::find($id)) {
            return redirect()->route('setores.index');
        }

        $setor->delete();

        return redirect()->route('setores.index');
    }
}
