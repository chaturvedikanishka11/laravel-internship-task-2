<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogkeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogkeywords', function (Blueprint $table) {
            $table->id('keywordid');
            $table->integer('BlogID')->unsigned();
            $table->foreign('BlogID')->references('blogid')->on('blog');
            $table->string('KeywordName');
            $table->string('Status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogkeywords');
    }
}
