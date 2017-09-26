<?php

use Illuminate\Database\Seeder;
use App\ItemChecker;

class ItemCheckerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
  {
        $item = new ItemChecker();
        $item->website = "http://php.net/manual/en/book.mhash.php";
        $item->backlink = "mhash.examples.php";
        $item->user_id = 1;
        $item->project_id = 1;
        $item->save();

        $item = new ItemChecker();
        $item->website = "http://www.facebook.com/";
        $item->backlink = "yellowstone.com";
        $item->user_id = 1;
        $item->project_id = 1;
        $item->save();

        $item = new ItemChecker();
        $item->website = "http://www.google.com/";
        $item->backlink = "http://redrocks.com/";
        $item->user_id = 2;
        $item->project_id = 1;
        $item->save();
  }
}
