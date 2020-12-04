<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicacionController extends Controller
{
    public function index(){
        if ( ! session()->has("search")) {
            session()->put("search", null);
            session()->put("trashed", null);
        }
        return Inertia::render("Publicaciones/Index", [
            "filters" => session()->only(["search", "trashed"]),
            "publicaciones" => Publicacion::with("user")
                ->orderByDesc("id")
                ->filter(request()->only("search", "trashed"))
                ->paginate(5),
        ]);
    }

    public function  create(){
        return Inertia::render("Publicaciones/Create");
    }

    public  function store(Request $request){
        //return $request->all();
        $publicacion = new Publicacion();
        $publicacion->titulo=$request['titulo'];
        $publicacion->contenido=$request['contenido'];
        $publicacion->categoria=$request['categoria'];
        $publicacion->nombre_autor=$request['nombre_autor'];
        $publicacion->save();
        $result= response()->json([
            'success' => true,
            'code' => 300,
            'message' => "Operacion realizada con exito",
            'data' => ['publicacion'=>$publicacion]
        ], 200);

        return redirect()->route('publicaciones.index')->with('success','Publicacion creada');
    }

    public function edit(Publicacion $publicacion){

        return Inertia::render('Publicaciones/Edit',[
            'publicacion' => [
                'id'=>$publicacion->id,
                'titulo'=>$publicacion->titulo,
                'contenido'=>$publicacion->contenido,
                'nombre_autor'=>$publicacion->nombre_autor,
                'categoria'=>$publicacion->categoria,
                'deleted_at' => $publicacion->deleted_at
            ]
        ]);

    }
}
