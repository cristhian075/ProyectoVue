<?php

use Illuminate\Database\Seeder;
use App\model\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = array(
            ['category_id' =>1, 'name' => 'Arroz Diana x 1000', 'price' => 2000, 'image'=>'https://exitocol.vtexassets.com/arquivos/ids/5564249-800-auto?width=800&height=auto&aspect=true'],
            ['category_id' =>2, 'name' => 'Coca Cola x 400', 'price' => 2000, 'image'=>'https://exitocol.vtexassets.com/arquivos/ids/7529220-800-auto?width=800&height=auto&aspect=true'],
            ['category_id' =>3, 'name' => 'Mouse Inalambrico', 'price' => 30000, 'image'=>'https://exitocol.vtexassets.com/arquivos/ids/7477881-800-auto?width=800&height=auto&aspect=true'],
        );

        foreach ($products as $product){
            Product::updateOrCreate($product);
        }
    }
}
