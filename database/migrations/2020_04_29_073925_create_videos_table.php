<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     * `id` int(11) NOT NULL,
    `video_uri` varchar(255) NOT NULL,
    `image_url` varchar(255) NOT NULL,
    `is_send_notification` tinyint(4) NOT NULL DEFAULT 0,
    `keyword` varchar(255) ,
    `type` enum('free','payed')  NOT NULL DEFAULT 'free',
    `created_by` int(11) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');// refer to user id that create the record
            $table->string('video_url');// video path in that location
            $table->string('image_url');// img path in that location
            $table->tinyInteger('is_notified')->default(0);
            $table->string('keyword');
            $table->enum('type',['free','payed'])->default('free');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
