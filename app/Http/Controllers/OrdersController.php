<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrdersFormRequest;
use App\Models\Orders;
use App\Models\TiposSolic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{ 
    public function index()
    {
        return view('orders.orders', [
            'orders' => DB::table('orders')
                        ->where('empresa_id', '=', Auth::user()->empresa_id)
                        ->where('user_id', '=', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->get(),
        ]);
    }

    public function show()
    {
        return view('orders.orders-pend', [
                'orders' => DB::table('orders')
                    ->where('empresa_id', '=', Auth::user()->empresa_id)
                    ->where('situation', '=', 'P')
                    ->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return view('orders.new-order', [
            'setores' => DB::table('setores')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
            'tipos'   => DB::table('tipos_solics')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
        ]);
    }

    public function store(StoreUpdateOrdersFormRequest $request)
    {
        $order = new Orders;

        $order->situation   = 'P';
        $order->empresa_id  = Auth::user()->empresa_id;
        $order->user_id     = Auth::user()->id;
        $order->tipo_id     = $request->type;
        $order->setor_id    = $request->setor;
        $order->expires_at  = Carbon::now()->addDays(5);
        $order->description = $request->description;
        $order->save();

        return redirect()->route('orders.index');
    }

    public function edit($id)
    {
        if (!$order = Orders::find($id)) {
            return redirect()->route('orders.index');
        }

        return view('orders.edit-order', [
            'order' => $order,
            'setores' => DB::table('setores')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
            'tipos'   => DB::table('tipos_solics')->where('empresa_id', '=', Auth::user()->empresa_id)->get(),
        ]);
    }

    public function update(StoreUpdateOrdersFormRequest $request, $id)
    {
        if (!$order = Orders::find($id)) {
            return redirect()->route('orders.index');
        }

        $order->tipo_id     = $request->type;
        $order->setor_id    = $request->setor;
        $order->description = $request->description;
        $order->save();

        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        if (!$order = Orders::find($id)) {
            return redirect()->route('orders.index');
        }

        $order->delete();

        return redirect()->route('orders.index');
    }

    public function approve(Request $request, $id)
    {
        if (!$order = Orders::find($id)) {
            return redirect()->route('orders.pendentes');
        }

        if ($request->approve == 'S') {
            $order->situation = 'A';

        } else {
            $order->situation = 'R';
        }

        $order->accepted_by = Auth::user()->id;
        $order->accepted_in = date('Y-m-d H:i:s');
        $order->save();

        return redirect()->route('orders.pendentes');
    }

    public function history()
    {
        return view('orders.orders-approve', [
            'orders' => DB::table('orders')
                            ->where('empresa_id', '=', Auth::user()->empresa_id)
                            ->where('situation', '!=', 'P')
                            ->orderBy('id', 'desc')
                            ->get(),
        ]);
    }
}
