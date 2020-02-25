<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
    
        $this->withExceptionHandling()
        ->post('/threads/some-channel/1/replies', [])
        ->assertRedirect('/login');
    }

   /** @test */
   public function an_authenticated_user_may_participate_in_form_threads()
   {
    $this->signIn();

    //$this->be($user = factory('App\User')->create());

    $thread = create('App\Thread');

    $reply = make('App\Reply');  

    

    $this->post($thread->path().'/replies', $reply->toArray());

    $this->get($thread->path())
        ->assertSee($reply->body);
   }

   /** @test */
   public function a_reply_reqires_a_body()
   {
    $this->withExceptionHandling()->signIn();

    $thread = create('App\Thread');

    $reply = make('App\Reply', ['body' => null]);  

    $this->post($thread->path().'/replies', $reply->toArray())
        ->assertSessionHasErrors('body');
   }
}
