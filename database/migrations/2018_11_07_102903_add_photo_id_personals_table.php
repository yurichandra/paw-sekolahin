<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoIdPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->unsignedInteger('photo_id')->after('user_id')->nullable();

            $table->foreign('photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->dropForeign(['photo_id']);
            $table->dropColumn('photo_id');
        });
    }
}
