<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public static function makeSale($id)
    {
        $producto = self::find($id);
        if($producto->stock > 0){
            $producto->stock -= 1;
            $producto->fecha_ultima_venta = date('Y-m-d H:i:s');
            if($producto->save()){
                return response()->json($producto->fecha_ultima_venta);
            }else{
                response("Error")->setStatusCode(422);
            }
        }else {
            return response("No venta por no tener producto en stock")->setStatusCode(422);;
        }
    }
}
