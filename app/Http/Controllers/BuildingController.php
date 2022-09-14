<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return $buildings;
    }

    public function show($id)
    {
        $building = Building::find($id);
        return $building;  
    }

    public function update(Request $request, $id)
    {
        $building = Building::find($id);
        $building->zip = $request->zip;
        $building->neighborhood = $request->neighborhood;
        $building->number = $request->number;
        $building->complement = $request->complement;
        $building->city = $request->city;
        $building->state = $request->state;
        $building->save();
        
        return response()->json([ "message" => "Predio atualizado com sucesso"], 201);
    }

    public function store(Request $request)
    {
        $building = new Building();
        $building->name = $request->name;
        $building->descricao = $request->descricao;
        $building->user_id = $request->user_id;
        $building->photos = $request->photos;
        $building->zip = $request->zip;
        $building->neighborhood = $request->neighborhood;
        $building->number = $request->number;
        $building->complement = $request->complement;
        $building->city = $request->city;
        $building->state = $request->state;
        $building->url_google = $request->url_google;
        $building->save();

        return response()->json([ "message" => "Predio cadastrado com sucesso"], 200);
    }

    public function delete($id)
    {
        $building = Building::find($id);
        $building->delete();

        return response()->json([ "message" => "Predio deletado com sucesso"], 200);
    }
}
