<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTiposSolicFormRequest;
use App\Models\TiposSolic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TiposSolicController extends Controller
{
    public function show()
    {
        return view('tipos.index', [
            'tipos' => DB::table('tipos_solics')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
        ]);
    }

    public function store(StoreUpdateTiposSolicFormRequest $request)
    {
        $tipos = new TiposSolic;

        $tipos->empresa_id = Auth::user()->empresa_id;
        $tipos->type       = $request->tipo;
        $tipos->save();

        return redirect()->route('tipos.index');
    }

    public function edit($id)
    {
        if (!$tipos = TiposSolic::find($id)) {
            return redirect()->route('tipos.index');
        }

        return view('tipos.edit', [
            'tipos' => $tipos
        ]);
    }

    public function update(StoreUpdateTiposSolicFormRequest $request, $id)
    {
        if (!$tipos = TiposSolic::find($id)) {
            return redirect()->route('tipos.index');
        }

        $tipos->type = $request->type;
        $tipos->save();

        return redirect()->route('tipos.index');
    }

    public function destroy($id)
    {
        if (!$tipos = TiposSolic::find($id)) {
            return redirect()->route('tipos.index');
        }

        $tipos->delete();

        return redirect()->route('tipos.index');
    }
}
