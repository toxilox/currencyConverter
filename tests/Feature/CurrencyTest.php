<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->post('/clear-currencies');
        $response->assertStatus(200);

        $response = $this->post('/update-currencies');
        $response->assertStatus(200);

    }
}
