<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return $types;
    }

    public function show($id)
    {
        $type = Type::find($id);
        return $type;  
    }

    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $type->name = $request->name;
        $type->descricao = $request->descricao;
        $type->save();

        return response()->json([ "message" => "Tipo atualizado com sucesso"], 200);
    }

    public function store(Request $request)
    {
        $type = new Type();
        $type->name = $request->name;
        $type->descricao = $request->descricao;
        $type->save();

        return response()->json([ "message" => "Tipo criado com sucesso"], 201);
    }

    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();

        return response()->json([ "message" => "Tipo deletado com sucesso"], 200);
    }
}
