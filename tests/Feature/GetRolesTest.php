<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class getRolesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getUserRoles()
    {
        $response = $this->get('/api/getuserroles');

        $response
			->assertStatus(200)
			->assertJsonIsArray();
    }
}
