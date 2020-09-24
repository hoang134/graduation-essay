<?php

use Illuminate\Database\Seeder;
use App\TopicReport;

class TopicReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $topicReport = new TopicReport();
         $topicReport->id = 1;
         $topicReport->post_id = 1;
         $topicReport->title = 'báo cáo tuần 1';
         $topicReport->save();

        $topicReport = new TopicReport();
        $topicReport->id = 2;
        $topicReport->post_id = 2;
        $topicReport->title = 'báo cáo tuần 1';
        $topicReport->save();

        $topicReport = new TopicReport();
        $topicReport->id = 3;
        $topicReport->post_id = 3;
        $topicReport->title = 'báo cáo tuần 1';
        $topicReport->save();

        $topicReport = new TopicReport();
        $topicReport->id = 4;
        $topicReport->post_id = 4;
        $topicReport->title = 'báo cáo tuần 1';
        $topicReport->save();
    }
}
