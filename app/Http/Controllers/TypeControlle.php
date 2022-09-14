<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $user = Type::all();
        return $user;
    }

    public function show($id)
    {
        $user = Type::find($id);
        return $user;  
    }

    public function update($id)
    {
        $user = Type::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $user = new Type();
        return $user;
    }

    public function delete($id)
    {
        $user = Type::find($id);
        $user->delete();
        return response()->json('Usuario deletado com sucesso');
    }
}
