<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use App\Models\Job;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job_Tag>
 */
class JobTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tag_id'=>Tag::factory(),
            'job_id'=>Job::factory(),
        ];
    }
}
