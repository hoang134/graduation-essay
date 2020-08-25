<?php

use Illuminate\Database\Seeder;
use App\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report = new Report();
        $report->user_post_id= 1;
        $report->title = "bao cao 1";
        $report->content = "bao cao tuan 1";
        $report->save();
    }
}
