<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Categories::insert([
            ['name' => 'Indonesian', 'image' => 'images/cuisines/indonesian.png'],
            ['name' => 'Japanese', 'image' => 'images/cuisines/japanese.png'],
            ['name' => 'Korean', 'image' => 'images/cuisines/korean.png'],
            ['name' => 'Fast Food', 'image' => 'images/cuisines/fastfood.png'],
            ['name' => 'Italian', 'image' => 'images/cuisines/italian.png'],
            ['name' => 'Western', 'image' => 'images/cuisines/western.png'],
        ]);
    }
}
