<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Almacen::all();

        return response()->json($articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Almacen();

        $almacen->model=$request->model;
        $almacen->name=$request->name;
        $almacen->price=$request->price;
        $almacen->section=$request->section;

        $almacen->save();

        return response()->json($almacen, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $almacen=Almacen::find($id);
        if($almacen){
            $almacen->model=$request->model;
            $almacen->name=$request->name;
            $almacen->price=$request->price;
            $almacen->section=$request->section;
            $almacen->save();

            return response()->json($almacen, 200);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Producto no actualizado'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacen=Almacen::find($id);
        if($almacen){
            $almacen->delete();
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Producto no borrado'
            ]);
        }
    }
}
