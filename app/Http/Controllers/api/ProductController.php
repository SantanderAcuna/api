<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod = Products::all();
        return response()->json([
            'status' => 204,
            'producto' => $prod

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create($request->all());
        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prod = Products::find($id);
        return response()->json([
            'status' => 204,
            'producto' => $prod

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Products::find($id);
        $prod->fill($request->all());
        $prod->save();
        return response()->json([
            'status' => 204,
            'Producto' => $prod,
            'mensaje' => "Producto actualizado"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prod = Products::find($id);
        $prod->delete();
        return response()->json([
            'status' => 204,
            'Producto' => $prod,
            'mensaje' => "Producto Eliminado"
        ]);
    }
}
