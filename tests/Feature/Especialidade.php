<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Especialidade extends TestCase
{
    /**@test */
    public function only_logged_especialidade()
    {
        $response = $this->get('/especialidade');

        $response->assertRedirect('/login');
    }
}
