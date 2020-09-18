<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id('blogid');
            $table->integer('BlogCategoryID')->unsigned();
            $table->foreign('BlogCategoryID')->references('categoryid')->on('blogcategory');
            $table->string('Name');
            $table->string('BannerImage');
            $table->string('MainImage');
            $table->string('Description');
            $table->string('Status');
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
        Schema::dropIfExists('blog');
    }
}
