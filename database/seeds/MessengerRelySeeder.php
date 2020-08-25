<?php

use Illuminate\Database\Seeder;
use App\MessengerReply;
class MessengerRelySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messengerReply = new MessengerReply();
        $messengerReply->id = 1;
        $messengerReply-> messenger_id =1;
        $messengerReply-> content ="messenger reply";
        $messengerReply->save();

    }
}
