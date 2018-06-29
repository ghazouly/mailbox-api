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

    public function testShow()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer 00201008280777',
        ])->json('GET', '/api/v1/messages/1');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                	"message"=> "Message Listed Successfully",
                	"result"=> [
                  		"uid"=> 21,
                  		"sender"=> "Ernest Hemingway",
                  		"subject"=> "animals",
                  		"message"=> null,
                  		"is_read"=> 1,
                  		"is_archived"=> 1,
                  		"time_sent"=> [
                    			"date"=> "2016-03-29 08:24:27.000000",
                    			"timezone_type"=> 3,
                    			"timezone"=> "UTC"
                  		]
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
