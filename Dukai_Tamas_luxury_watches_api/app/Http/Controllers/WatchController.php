<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use Illuminate\Http\Request;

class WatchController extends Controller
{

    public function getAllWatches()
    {
        $watches = Watch::with('brand')->get();
       // return response()->json($watches, 200);
       return response()->json([
        'data' => $watches
    ], 200);
    }


    public function getWatchById($id)
{
    $watch = Watch::with('brand')->find($id);
    if (!$watch) {
        return response()->json(['message' => 'Watch not found'], 404);
    }
    return response()->json($watch, 200);
}

public function storeWatch(Request $request)
{
    $validated = $request->validate([
        'Model' => 'required|string|max:1024',
        'Brand_Id' => 'required|exists:brands,id',
        'Price_USD' => 'numeric',
    ]);

    $watch = Watch::create($validated);
    return response()->json($watch, 201);
}


public function updateWatch(Request $request, $id)
{
    $watch = Watch::find($id);
    if (!$watch) {
        return response()->json(['message' => 'Watch not found'], 404);
    }

    $watch->update($request->all());
    return response()->json($watch, 200);
}

public function deleteWatch($id)
{
    $watch = Watch::find($id);
    if (!$watch) {
        return response()->json(['message' => 'Watch not found'], 404);
    }

    $watch->delete();
    return response()->json(null, 204);
}


}
