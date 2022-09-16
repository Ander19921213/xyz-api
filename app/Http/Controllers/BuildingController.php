<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::with(['user', 'rooms', 'images'])->get();
        return $buildings;
    }

    public function show($id)
    {
        $building = Building::with(['user', 'rooms', 'images'])->where('id', $id)->get();
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

        Image::storeImage($request, $id, 'building');

        return response()->json(["message" => "Predio atualizado com sucesso"], 201);
    }

    public function store(Request $request)
    {
        try {
            $building = new Building();
            $building->name = $request->name;
            $building->descricao = $request->descricao;
            $building->user_id = $request->user_id;
            $building->zip = $request->zip;
            $building->neighborhood = $request->neighborhood;
            $building->number = $request->number;
            $building->complement = $request->complement;
            $building->city = $request->city;
            $building->state = $request->state;
            $building->url_google = $request->url_google;
            $building->save();

            Image::storeImage($request, $building->id, 'building');

            return response()->json(["message" => "Predio cadastrado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        $building = Building::find($id);
        $building->delete();

        return response()->json(["message" => "Predio deletado com sucesso"], 200);
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $image->delete();

        return response()->json(["message" => "Imagem removida com sucesso"], 200);
    }
}
