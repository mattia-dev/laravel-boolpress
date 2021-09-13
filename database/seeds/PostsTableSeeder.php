<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 100; $i++){

            $postObject = new Post();
            $postObject->title = $faker->sentence(6);  
            $postObject->author = $faker->words(2, true);
            $postObject->author_id = $faker->randomNumber(6, false);
            $postObject->post_image = $faker->imageUrl(360, 360, 'animals', true);
            $postObject->body = $faker->paragraphs(10, true);
            $postObject->save();
        }

    }

}