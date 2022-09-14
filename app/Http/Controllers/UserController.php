<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
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
        return $user;
    }

    public function store(UserRequest $request)
    {
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
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('Usuario deletado com sucesso');
    }
}
