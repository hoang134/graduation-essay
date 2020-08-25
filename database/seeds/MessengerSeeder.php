<?php

use Illuminate\Database\Seeder;
use App\Messenger;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $messenger = new Messenger();
       $messenger->id = 1;
        $messenger->user_id=1;
       $messenger->content ="messenger 1";
       $messenger->save();
    }
}
