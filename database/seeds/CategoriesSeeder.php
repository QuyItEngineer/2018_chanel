<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        if(DB::table('categories')->exists()){
            DB::table('categories')->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Models\Category::class, 5)->create();
    }
}
