<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 * @author Vinícius Sarmento
 * @link https://github.com/ViniciusSCS
 * @date 2024-08-23 21:48:54
 * @copyright UniEVANGÉLICA
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::select('id', 'name', 'email')->paginate('2');

        return [
            'status' => 200,
            'menssagem' => 'Usuários encontrados!!',
            'user' => $user
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return [
            'status' => 200,
            'menssagem' => 'Usuário cadastrado com sucesso!!',
            'user' => $user
        ];
    }

    /*
      Update the specified resource in storage.
     Esse método lida com a atualização de um usuário. Primeiro, tenta encontrar o usuário pelo ID.
     Se não achar, retorna um erro dizendo que o usuário não foi encontrado.
     Se encontrar, ele atualiza o usuário com os dados recebidos e devolve uma resposta dizendo que deu tudo certo.
     */
    public function update(Request $request, string $id)
    {
        // Encontrar o usuário pelo ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        // Atualizar os dados do usuário
        $user->update($request->all());

        return response()->json([
            'status' => 200,
            'menssagem' => 'Usuário atualizado com sucesso!!',
            'user' => $user
        ]);
    }

    /*
     Remove the specified resource from storage.
     Esse método cuida de deletar um usuário. Tenta achar o usuário pelo ID e, se não achar, retorna um erro.
     Se achar, deleta o usuário e manda uma resposta dizendo que deu tudo certo.
     */
    public function destroy(string $id)
    {
        // Encontrar o usuário pelo ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        // Deletar o usuário
        $user->delete();

        return response()->json([
            'status' => 200,
            'menssagem' => 'Usuário deletado com sucesso!!'
        ]);
    }
}
