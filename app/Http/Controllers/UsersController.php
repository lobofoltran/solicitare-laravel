<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUsersFormRequest;
use App\Models\Empresas;
use App\Models\User;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function show()
    {
        return view('usuarios.index', [
            'usuarios' => $this->model->get(),
        ]);
    }

    public function create()
    {
        return view('usuarios.new-user', [
            'empresas' => Empresas::get(),
        ]);
    }

    public function store(StoreUpdateUsersFormRequest $request)
    {
        $user = new $this->model;
        $user->empresa_id = $request->empresa_id;
        $user->matricula  = $request->matricula;
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->sysadm     = $request->sysadm ? '1' : '0';
        $user->admin      = $request->admin ? '1' : '0';
        $user->func       = $request->func ? '1' : '0';
        $user->password   = bcrypt('mudar@123');
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        if (!$usuarios = $this->model->find($id)) {
            return redirect()->route('usuarios.index');
        }

        return view('usuarios.edit', [
            'user' => $usuarios,
            'empresas' => Empresas::get(),
        ]);
    }

    public function update(StoreUpdateUsersFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('usuarios.index');
        }

        $user->empresa_id = $request->empresa_id;
        $user->matricula  = $request->matricula;
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->sysadm     = $request->sysadm ? '1' : '0';
        $user->admin      = $request->admin ? '1' : '0';
        $user->func       = $request->func ? '1' : '0';
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        if (!$tipos = $this->model->find($id)) {
            return redirect()->route('usuarios.index');
        }

        $tipos->delete();

        return redirect()->route('usuarios.index');
    }}
