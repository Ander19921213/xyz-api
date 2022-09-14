<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $user = Room::all();
        return $user;
    }

    public function show($id)
    {
        $user = Room::find($id);
        return $user;  
    }

    public function update($id)
    {
        $user = Room::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $user = new Room();
        return $user;
    }

    public function delete($id)
    {
        $user = Room::find($id);
        $user->delete();
        return response()->json('Sala deletada com sucesso');
    }
}
