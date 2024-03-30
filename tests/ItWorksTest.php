<?php

use Illuminate\Foundation\Testing\TestCase;

class ItWorksTest extends TestCase
{
    /** @test */
    public function it_works()
    {
        $response = $this->get('/');

        $response->assertOk();
    }
}
