<?php

use Illuminate\Database\Seeder;
use App\model\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = array(
            ['name' => 'Granos'],
            ['name' => 'Bebidas'],
            ['name' => 'Tecnologia'],
        );
        foreach ($categories as $category){
            category::updateOrCreate($category);
        }
    }
}
