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
}
