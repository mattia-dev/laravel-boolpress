<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 100; $i++){

            $postObject = new Post();
            $postObject->title = $faker->sentence(6); 
            
            $users = User::All();
            $usersIdArray = [];
            foreach($users as $user) {
                $usersIdArray[] = $user->id;
            }
            $randUserKey = array_rand($usersIdArray, 1);
            $userID = $usersIdArray[$randUserKey];
            $postObject->user_id = $userID;

            $postObject->image = $faker->imageUrl(360, 360, 'movies', true);
            $postObject->body = $faker->paragraphs(12, true);
            $postObject->tags = $faker->words(3, true);
            $postObject->views = $faker->randomNumber(5, false);
            $postObject->premium_content = $faker->boolean();
            $postObject->save();
        }

    }

}