<?php

namespace App\Http\Controllers;

use App\Models\UserFuneralHome;
use Illuminate\Http\Request;

class UserFuneralHomeController extends Controller
{
    public function index()
    {
        $userFuneralHomes = UserFuneralHome::all();
        return response()->json($userFuneralHomes);
    }

    public function store(Request $request)
    {
        $userFuneralHome = UserFuneralHome::create($request->all());
        return response()->json($userFuneralHome, 201);
    }

    public function show($id)
    {
        $userFuneralHome = UserFuneralHome::find($id);
        return response()->json($userFuneralHome);
    }

    public function update(Request $request, $id)
    {
        $userFuneralHome = UserFuneralHome::findOrFail($id);
        $userFuneralHome->update($request->all());
        return response()->json($userFuneralHome, 200);
    }

    public function destroy($id)
    {
        UserFuneralHome::destroy($id);
        return response()->json(null, 204);
    }
}

