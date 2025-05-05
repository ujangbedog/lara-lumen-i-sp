<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Introduction to Lumen',
                'content' => 'Lumen is a micro-framework by Laravel...',
                'author_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Learning in the Digital Age',
                'content' => 'Technology has changed education...',
                'author_id' => 2,
                'category_id' => 2
            ],
            [
                'title' => 'Healthy Lifestyle Tips',
                'content' => 'Eat healthy, exercise regularly...',
                'author_id' => 3,
                'category_id' => 3
            ],
        ]);
    }
}
