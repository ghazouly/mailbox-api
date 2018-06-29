<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Message;


class MessageTest extends TestCase
{

    public function testCheckAuth()
    {
        $response = $this->get('/api/v1/messages');
        $response->assertStatus(401);
    }

    public function testIndex()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 00201008280777',
        ])->json('GET', '/api/v1/messages');

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Messages Listed Successfully',
            ]);
    }

    public function testShow($id=1)
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 00201008280777',
        ])->json('GET', '/api/v1/messages/'.$id);

        $response
            ->assertStatus(200)
            ->assertJson([
                	"message"=> "Message Listed Successfully",
                	"result"=> [
                  ]
            ]);
    }

    public function testRead($id=1)
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 00201008280777',
        ])->json('GET', '/api/v1/messages/'.$id.'/read');

        $message = Message::find($id);
        $response
            ->assertOk($message->is_read == 1)
            ->assertJson([
                'message' => 'Message Read Successfully',
            ]);
    }

    public function testArchive($id=1)
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 00201008280777',
        ])->json('GET', '/api/v1/messages/'.$id.'/archive');

        $message = Message::find($id);
        $response
            ->assertOk($message->is_archived == 1)
            ->assertJson([
                'message' => 'Message Archived Successfully',
            ]);
    }


}
