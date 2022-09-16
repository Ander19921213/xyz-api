<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $validated = $this->validar_cnpj($request->cnpj);
            if ($validated) {
                $used = User::where('cnpj', $request->cnpj)->first();
                if ($used === null) {
                    $user = User::find($id);
                    $user->social_name = $request->social_name;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->cnpj = $request->cnpj;
                    $user->phone = $request->phone;
                    $user->birth_date = $request->birth_date;
                    $user->zip = $request->zip;
                    $user->neighborhood = $request->neighborhood;
                    $user->number = $request->number;
                    $user->complement = $request->complement;
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->save();

                    return response()->json(["message" => "Usuario atualizado com sucesso"], 200);
                } else {
                    return response()->json(["message" => "cnpj ja cadastrado"], 200);
                }
            } else {
                return response()->json(["message" => "Cnpj invalido"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->validar_cnpj($request->cnpj);

            if ($validated) {
                $used = User::where('cnpj', $request->cnpj)->first();
                if ($used === null) {
                    $user = new User();
                    $user->social_name = $request->social_name;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->cnpj = $request->cnpj;
                    $user->phone = $request->phone;
                    $user->birth_date = $request->birth_date;
                    $user->zip = $request->zip;
                    $user->neighborhood = $request->neighborhood;
                    $user->number = $request->number;
                    $user->complement = $request->complement;
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->save();

                    return response()->json(["message" => "Usuario criado com sucesso"], 201);
                } else {
                    return response()->json(["message" => "Cnpj ja cadastrado"], 200);
                }
            } else {
                return response()->json(["message" => "Cnpj invalido"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(["message" => "Usuario deletado com sucesso"], 200);
    }

    public function validar_cnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
}
