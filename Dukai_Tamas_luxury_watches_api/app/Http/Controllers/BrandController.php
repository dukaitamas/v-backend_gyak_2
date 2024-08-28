<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getWatchesByBrand($brand_id)
{
    $brand = Brand::find($brand_id);
    if (!$brand) {
        return response()->json(['message' => 'Brand not found'], 404);
    }

    $watches = $brand->watches;
    return response()->json($watches, 200);
}

}
