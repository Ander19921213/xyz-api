<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }

    public function show($id)
    {
        $room = Room::find($id);
        return $room;  
    }

    public function update(Request $request, $id)
    {
        try {
            $room = Room::find($id);
            $room->building_id = $request->building_id;
            $room->name = $request->name;
            $room->descricao = $request->descricao;
            $room->type_id = $request->type_id;
            $room->amount = $request->amount;
            $room->save();

            $files = $request->images;
            foreach ($files as $val) {
                $file = $val->store('public/images');
                $file = Str::replace('public', '', $file);
        
                $image = new Image();
                $image->type = 'room';
                $image->external_id = $room->id;
                $image->url = $file;
                $image->save();
            }
    
            return response()->json([ "message" => "Sala atualizada com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json([ "message" => $e->getMessage() ], 500);
        }

    }

    public function store(Request $request)
    {
        try {
            $room = new Room();
            $room->building_id = $request->building_id;
            $room->name = $request->name;
            $room->descricao = $request->descricao;
            $room->type_id = $request->type_id;
            $room->amount = $request->amount;
            $room->save();
            
            return response()->json([ "message" => "Sala criada com sucesso"], 201);
        } catch (Exception $e) { 
            return response()->json([ "message" => $e->getMessage() ], 500);
        }
   
    }

    public function delete($id)
    {
        $user = Room::find($id);
        $user->delete();

        return response()->json([ "message" => "Sala deletada com sucesso"], 200);
    }
}
