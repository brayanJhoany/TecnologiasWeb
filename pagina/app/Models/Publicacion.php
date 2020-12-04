<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'titulo','contenido','categoria',
        'numDeVotaciones','urlImagenPublicacion',
        'nombre_autor','urlImagen_autor'
    ];

   protected  static function boot(){
       parent::boot();
       self::creating(function ($table) {
           if ( ! app()->runningInConsole()) {
               $table->user_id = auth()->id();
           }
       });
   }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters) {
        if ( ! request("page")) {
            session()->put("search", $filters['search'] ?? null);
            session()->put("trashed", $filters['trashed'] ?? null);
        }
        $query->when(session("search"), function ($query, $search) {
            $query->where('titulo', 'LIKE', '%'.$search.'%');
        })->when(session("trashed"), function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
