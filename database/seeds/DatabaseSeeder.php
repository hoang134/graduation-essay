<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call(UserSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(UserPostSeeder::class);
         $this->call(TopicReportSeeder::class);
         $this->call(ReportSeeder::class);
         $this->call(CommentSeeder::class);
         $this->call(CommentRelySeeder::class);
    }
}
