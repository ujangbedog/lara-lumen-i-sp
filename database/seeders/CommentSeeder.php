<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            ['commenter' => 'Diana', 'comment' => 'Very helpful, thanks!', 'article_id' => 1],
            ['commenter' => 'Evan', 'comment' => 'Nice read!', 'article_id' => 2],
            ['commenter' => 'Faith', 'comment' => 'Great info!', 'article_id' => 3],
        ]);
    }
}
