<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

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

    public function update($id)
    {
        $room = Room::find($id);
        $room->save();

        return response()->json([ "message" => "Sala atualizada com sucesso"], 200);
    }

    public function store(Request $request)
    {
        $room = new Room();
        $room->save();

        return response()->json([ "message" => "Sala criada com sucesso"], 201);
    }

    public function delete($id)
    {
        $user = Room::find($id);
        $user->delete();

        return response()->json([ "message" => "Sala deletada com sucesso"], 200);
    }
}
