<?php
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        if(DB::table('banners')->exists()){
            DB::table('banners')->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Models\Banner::class, 2)->create();
    }

}