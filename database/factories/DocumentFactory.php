<?php

namespace Database\Factories;

use App\Models\Document;
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
    protected $model = Document::class;
    
    public function definition()
    {
        $filenameSuffix = $this->faker->unique()->numberBetween(1, 10);
        $filename = 'document' . $filenameSuffix . '.pdf';

        return [
            'user_id' => $this->faker->randomElement([1, 2]),
            'title' => $this->faker->sentence(rand(12, 15)),
            'faculty' => $this->faker->randomElement(['feco', 'flaw', 'feng', 'fmed', 'fagr', 'fedu', 'fsoc', 'fmat', 'focs', 'foph']),
            'abstract' => $this->faker->paragraphs(rand(3, 6), true),
            'item_type' => $this->faker->randomElement(['ug', 'ms', 'phd']),
            'filename' => $filename,
            'published_date' => now()->format('Y-m-d'),
            'status' => 'Accepted',
        ];
    }
}
