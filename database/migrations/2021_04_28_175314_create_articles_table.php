<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('article_type');
            $table->string('featured_image')->nullable();
            $table->datetime('posting_date');
            $table->datetime('event_date_start')->nullable();
            $table->datetime('event_date_end')->nullable();
            $table->string('school_year')->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('level', 10);
            $table->tinyInteger('link_to_article')->nullable();
            $table->integer('user_id')->unsigned();
            $table->text('slug')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('articles');
    }
}
