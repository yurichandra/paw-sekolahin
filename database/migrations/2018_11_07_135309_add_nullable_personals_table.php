<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullablePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->string('phone_number', 12)->nullable()->change();
            $table->string('identity_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('personals', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('identity_number');
        });
    }
}
