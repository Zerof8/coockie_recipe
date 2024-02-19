<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ingredients = [
            ['name' => 'Sprinkles', 'capacity' => 2, 'durability' => 0, 'flavor' => -2, 'texture' => 0, 'calories' => 3],
            ['name' => 'Butterscotch', 'capacity' => 0, 'durability' => 5, 'flavor' => -3, 'texture' => 0, 'calories' => 3],
            ['name' => 'Chocolate', 'capacity' => 0, 'durability' => 0, 'flavor' => 5, 'texture' => -1, 'calories' => 8],
            ['name' => 'Candy', 'capacity' => 0, 'durability' => -1, 'flavor' => 0, 'texture' => 5, 'calories' => 8],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
