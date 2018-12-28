<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('columnist_id')->index()->unsigned()->comment('Columnist ID');
            $table->foreign('columnist_id')->references('id')->on('columnists');

            $table->string('title')->comment('Column Title');
            $table->text('content')->comment('Column Content');

            $table->integer('read_num')->default(0)->comment('Read Number');
            $table->integer('favorite_num')->default(0)->comment('Favorite Number');
            $table->integer('comment_num')->default(0)->comment('Comment Number');
            $table->integer('thumb_up_num')->default(0)->comment('Thumb Up Number');
            $table->integer('thumb_down_num')->default(0)->comment('Thumb Down Number');

            $table->softDeletes();
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
        Schema::dropIfExists('columns');
    }
}
