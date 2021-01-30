<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $type1 = new Type();
        $type1->name_type = 'MENU';
        $type1->save();

        $type2 = new Type();
        $type2->name_type = 'GUARNICIONES';
        $type2->save();

        $type3 = new Type();
        $type3->name_type = 'POSTRES';
        $type3->save();

        $category1 = new Category();
        $category1->name_category = 'MENU DEL DIA';
        $category1->save();

        $category2 = new Category();
        $category2->name_category = 'MENU EJECUTIVO';
        $category2->save();
        
        // \App\Models\User::factory(10)->create();
        Customer::factory(50)->create();
        Product::factory(20)->create();

    }
}
