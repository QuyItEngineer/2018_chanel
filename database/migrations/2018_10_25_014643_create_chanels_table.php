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
            $table->text('description');
            $table->text('video_url');
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on($tableNames['chanels'])
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
