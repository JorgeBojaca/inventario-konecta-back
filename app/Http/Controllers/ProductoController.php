<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProducto;
use App\Http\Requests\UpdateProducto;
use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function create(CreateProducto $request)
    {
        $data = $request->validated();
        $producto = new Producto($data);
        $producto->fecha_creacion = date('Y-m-d');

        return $producto->save();
    }
    public function update(UpdateProducto $request)
    {
        $data = $request->validated();
        $producto = Producto::find($data['id']);
        $producto->update($data);
        return response($producto);
    }

    public function delete(Request $request)
    {
        $id = $request->validate([
            'id'=>'required|exists:productos'
        ]);
        return Producto::destroy($id);
    }

    public function get(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|exists:productos'
        ]);
        
        return Producto::find($data['id']);
    }

    public function getAll()
    {
        return Producto::all();
    }

    public function sale(Request $request)
    {
        $data = $request->validate([
            'id'=>'required|exists:productos'
        ]);
        return Producto::makeSale($data['id']);
    }

}