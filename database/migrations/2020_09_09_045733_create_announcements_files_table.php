<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('announcement_id')->unsigned()->index();
            $table->string('fileName')->nullable();
            $table->timestamps();
            $table->softDeletes();

            //Relationships
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements_files');
    }
}
