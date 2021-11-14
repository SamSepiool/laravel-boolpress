<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $newPost = new Post();
            $newPost->title = $faker->words(5, true);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->username = $faker->userName();
            $newPost->content = $faker->paragraph(1, true);
            $newPost->save();
        }
    }
}
