<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $user = Building::all();
        return $user;
    }

    public function show($id)
    {
        $user = Building::find($id);
        return $user;  
    }

    public function update($id)
    {
        $user = Building::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $user = new Building();
        return $user;
    }

    public function delete($id)
    {
        $user = Building::find($id);
        $user->delete();
        return response()->json('Predio deletado com sucesso');
    }
}
