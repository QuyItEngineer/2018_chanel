<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('db_names.table_names');

        Schema::create('chanels', function (Blueprint $table) use ($tableNames) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('video_url');
            $table->char('is_show_video_url')->default('0');
            $table->integer('sub_category_id')->unsigned();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('sub_category_id')
                ->references('id')
                ->on($tableNames['sub_categories'])
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chanels');
    }
}
