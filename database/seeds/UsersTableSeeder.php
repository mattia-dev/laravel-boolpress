<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $nameList = ['Anna', 'Marco', 'Mario', 'Franco', 'Giulia', 'Mattia', 'Giacomo', 'Luigi', 'Luisa'];

        foreach($nameList as $name) {
            $userObject = new User();
            $userObject->name = $name;
            $userObject->email = $faker->email();
            $userObject->password = $faker->password();
            $userObject->save();
        }

    }
}
