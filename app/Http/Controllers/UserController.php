<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->update($request->all());

        return response()->json([
            'status' => 200,
            'mensagem' => 'Usuário atualizado com sucesso!!',
            'user' => $user
        ]);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 200,
            'mensagem' => 'Usuário deletado com sucesso!!'
        ]);
    }
}
