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
        factory(App\Post::class, 50)->create();


        // DB::table('posts')->insert([
        //     'title' => str_random(15),
        //     'body' => str_random(200),
        //     'slug' => str_random(15),
        //     'image' => 'a.jpg'
        // ]);

        //factory(App\Category::class, 7)->create();
    }
}
