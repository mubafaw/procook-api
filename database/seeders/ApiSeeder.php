<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Cookware products
        DB::table('products')->insert([
            'product_id' => 1,
            'product_name' => 'Gourmet Stainless Steel Cookware Set 4 piece',
            'product_desc' => 'Induction Cookware',
            'product_category' => 'Cookware',
            'product_price' => 99.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 2,
            'product_name' => 'Gourmet Stainless Steel Cookware Set 6 piece',
            'product_desc' => 'Induction Cookware',
            'product_category' => 'Cookware',
            'product_price' => 149.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 3,
            'product_name' => 'Gourmet Stainless Steel Cookware Set 8 piece',
            'product_desc' => 'Induction Cookware',
            'product_category' => 'Cookware',
            'product_price' => 199.00,
        ]);  

        // Insert Kitchen Knives products
        DB::table('products')->insert([
            'product_id' => 4,
            'product_name' => 'Gourmet X40 Knife Set 5 piece and Wooden Block',
            'product_desc' => 'Best Selling Kitchen Knives',
            'product_category' => 'Kitchen Knives',
            'product_price' => 79.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 5,
            'product_name' => 'Gourmet X40 Knife Set 6 piece and Wooden Block',
            'product_desc' => 'Best Selling Kitchen Knives',
            'product_category' => 'Kitchen Knives',
            'product_price' => 79.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 6,
            'product_name' => 'Gourmet X40 Knife Set 8 piece and Wooden Block',
            'product_desc' => 'Kitchen Knives',
            'product_category' => 'Cookware',
            'product_price' => 109.00,
        ]);  

        // Insert Bakeware products
        DB::table('products')->insert([
            'product_id' => 7,
            'product_name' => 'ProCook Non-Stick Bakeware Set 3 piece',
            'product_desc' => 'Bakeware',
            'product_category' => 'Baking',
            'product_price' => 44.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 8,
            'product_name' => 'ProCook Non-Stick Bakeware Set 4 piece',
            'product_desc' => 'Bakeware',
            'product_category' => 'Baking',
            'product_price' => 79.00,
        ]);  
        DB::table('products')->insert([
            'product_id' => 9,
            'product_name' => 'ProCook Non-Stick Bakeware Set 6 piece',
            'product_desc' => 'Bakeware',
            'product_category' => 'Baking',
            'product_price' => 109.00,
        ]);  
    }
}
