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
            $postObject->author = $faker->words(3, true);
            $postObject->author_id = $faker->randomNumber(6, false);
            $postObject->body = $faker->paragraphs(5, true);
            $postObject->save();
        }

    }

}