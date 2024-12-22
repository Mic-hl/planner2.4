<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id'        => 1,
            'name'      => 'Michl',
            'email'     => 'm@mail.com',
            'password'  => bcrypt('123123123')
        ]);

        Recipe::factory()->create([
            'id'          => 1,
            'title'       => 'Spaghetti Carbonara',
            'ingredients' => ['Spaghetti', 'Eggs', 'Parmesan', 'Bacon', 'Black Pepper'],
            'preparation' => 'Boil spaghetti. Cook bacon. Mix eggs with parmesan and combine with cooked spaghetti and bacon.',
            'difficulty'  => 'medium',
            'time'        => '30',
        ]);

        Recipe::factory()->create([
            'id'          => 2,
            'title'       => 'Pancakes',
            'ingredients' => ['Milk', 'Flour', 'Eggs', 'Butter'],
            'preparation' => 'Mix everything and then fry it in a pan.',
            'difficulty'  => 'easy',
            'time'        => '10',
        ]);

        Recipe::factory()->create([
            'id'          => 3,
            'title'       => 'Gulasch',
            'ingredients' => ['Meat', 'Onions', 'Broth', 'Tomato paste', 'Paprika powder', 'Butter', 'Thyme', 'Majoran', 'Salt', 'Pepper'],
            'preparation' => 'Fry the Meat for 10 minutes and then add the onions. After about 10 more minutes, add the tomato paste, mix it, and add the paprika powder. Mix the Butter with the Spices and add it to the pot. Cook it for about 90 minutes.',
            'difficulty'  => 'medium',
            'time'        => '120',
        ]);

        Recipe::factory(100)->create();
    }
}
