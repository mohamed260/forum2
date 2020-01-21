<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{

    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads')
            ->assertSee($thread->title);

        
    }
    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads/' . $thread->id)
            ->assertSee($thread->title);

    }
}
