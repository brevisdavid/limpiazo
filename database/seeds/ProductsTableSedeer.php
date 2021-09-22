<?php

use Illuminate\Database\Seeder;
use app\Product;
use app\Category;
use app\ProductImage;
class ProductsTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        factory(Category::class ,5)->create();
        factory(Product::class ,50)->create();
        factory(ProductImage::class ,100)->create();
    }
}
