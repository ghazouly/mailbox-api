<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/messages_sample.json');
        $data = json_decode($json);

        foreach ($data->messages as $object) {
            Message::create([
                'user_id'     => $object->uid,
                'sender'      => $object->sender,
                'subject'     => $object->subject,
                'message'     => $object->message,
                'created_at'  => date('Y-m-d h:i:s', $object->time_sent)
            ]);
        }
    }
}
