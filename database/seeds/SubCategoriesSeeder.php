<?php

use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        if(DB::table('sub_categories')->exists()){
            DB::table('sub_categories')->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Models\SubCategory::class, 5)->create();
    }
}
