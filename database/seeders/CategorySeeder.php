<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Vrste riba']);
        Category::create(['name' => 'Takmičenja']);
        Category::create(['name' => 'Pribor i oprema']);
        Category::create(['name' => 'Ribolovna mesta']);
        Category::create(['name' => 'Pravila i propisi']);
    }
}
