<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'dept' => 'Dept ' . rand(1, 5),
            'name' => 'Document ' . rand(1, 99),
            'filename' => rand(1, 3) . '.pdf',
        ];
    }
}
