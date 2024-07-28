<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function belongs_to_an_employer()
    {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create(['employer_id' => $employer->id]);

        $this->assertTrue($job->employer->is($employer));
    }
}
