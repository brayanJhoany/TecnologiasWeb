<?php

namespace Database\Factories;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publicacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titulo"=>$this->faker->title,
            "contenido"=>$this->faker->text(4000),
            "user_id" =>User::all()->random()->id,
            "categoria"=>"Deporte",
            "numDeLecturas"=>$this->faker->numberBetween(0,100),
            "numDeVotaciones"=>$this->faker->numberBetween(0,100),
            "urlImagenPublicacion"=>null,
            "nombre_autor"=>$this->faker->name,
            "urlImagen_autor"=>null,

        ];
    }
}
