<?php

use Illuminate\Database\Seeder;

class ChanelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        if(DB::table('chanels')->exists()){
            DB::table('chanels')->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(App\Models\Chanel::class, 5)->create();
    }
}
