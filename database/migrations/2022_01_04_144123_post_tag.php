<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->nullable();
            $table->integer('tag_id')->nullable();
            $table->timestamps();
        });
    }

    
        public function down()
        {
            Schema::dropIfExists('post_tag');
        }
    
}
