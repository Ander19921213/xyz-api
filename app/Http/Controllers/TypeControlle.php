<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Exception;
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
        try {
            $type = Type::find($id);
            $type->name = $request->name;
            $type->descricao = $request->descricao;
            $type->save();
   
            return response()->json([ "message" => "Tipo atualizado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json([ "message" => $e->getMessage() ], 500);
        }
      
    }

    public function store(Request $request)
    {
        try {
            $type = new Type();
            $type->name = $request->name;
            $type->descricao = $request->descricao;
            $type->save();
    
            return response()->json([ "message" => "Tipo criado com sucesso"], 201);
        } catch (Exception $e) {
            return response()->json([ "message" => $e->getMessage() ], 500);
        }
    
    }

    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();

        return response()->json([ "message" => "Tipo deletado com sucesso"], 200);
    }
}
