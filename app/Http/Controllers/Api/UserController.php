<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 404);
        }

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 404);
        }

        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 404);
        }

        $user->delete();
        return $user;
    }
}
