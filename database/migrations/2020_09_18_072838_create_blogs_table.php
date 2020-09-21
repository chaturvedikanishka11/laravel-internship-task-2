<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blogid');
            $table->integer('BlogCategoryID')->unsigned();
            $table->foreign('BlogCategoryID')->references('categoryid')->on('blogcategory');
            $table->string('Name');
            $table->string('SubName');
            $table->string('BannerImage');
            $table->string('MainImage');
            $table->string('Description');
            $table->string('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
