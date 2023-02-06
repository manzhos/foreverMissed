<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sendMailTest()
    {
		// test for right mail
		$response = $this->postJson('/api/sendmail', [
			'emailList' => [['email' => 'box@mail.io', 'roles' => 1]],
			'message'	=> 'message'
		]);

        $response
			->assertStatus(200)
			->assertOk();

		// test for wrong mail
		$response = $this->postJson('/api/sendmail', [
			'emailList' => [['email' => 'box@mailinator.com', 'roles' => 1]],
			'message'	=> 'message'
		]);

		$response
			->assertStatus(422);
    }
}
