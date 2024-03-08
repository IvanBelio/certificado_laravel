<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private function getDNI(): string {
        $letraDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
        $numero = fake()->randomNumber(8);
        $letra = $letraDNI[$numero%23];
        $dni = "$numero-$letra";
        return $dni;
    }

    public function definition(): array
    {
        $departamento = ["Informáica","Comercio","Imagen", ];
        return[
            'nombre'=>fake()->name(),
            'dni'=>$this->getDni(),
            'apellidos'=>fake()->lastName(),
            'email'=>fake()->email(),
            'departamento'=>fake()->randomElement($departamento),
        ];
    }
}
