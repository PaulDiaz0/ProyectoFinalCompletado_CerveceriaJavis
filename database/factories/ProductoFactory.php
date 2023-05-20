<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     *
     * @var string
     */

    protected $model = Producto::class;
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition()
    {
        return [
            'categoria_id' => $this->faker->numberBetween(1, 6),
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->sentence(6),
            'contenido' => $this->faker->sentence(3),
            'precio' => $this->faker->randomFloat(1, 20, 30),
        ];
    }
}