<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacementPreprationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placement_preprations', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->text('Course');
            $table->text('Subject');
            $table->text('Ques')->unique();
            $table->text('Option1');
            $table->text('Option2');
            $table->text('Option3');
            $table->text('Option4');
            $table->text('Explanation');
            $table->integer('Correct');
            $table->text('Company');
            $table->text('Publisher');
            $table->text('YoutubeLink');
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
        Schema::dropIfExists('placement_preprations');
    }
}
