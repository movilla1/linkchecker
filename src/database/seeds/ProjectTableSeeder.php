<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->title = "Elcan Software";
        $project->link = "www.elcansoftware.com";
        $project->user_id = 1;
        $project->save();
    }
}
