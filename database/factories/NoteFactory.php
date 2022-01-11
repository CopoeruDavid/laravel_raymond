<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "Note title",
            'body'  => $this->faker->text(),
            'document_id' => 1,
        ];
    }
}
