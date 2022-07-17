<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class preDefineCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['IoT', 'Blockchain', 'Laravel', 'PHP', 'AWS'];

        foreach($categories as $category){
            Categories::firstOrCreate([
                'name' => $category
            ]);
        }
    }
}
