<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
        ]);
    }
}
