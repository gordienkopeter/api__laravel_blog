<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTokenTypeColumnTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tokens', function (Blueprint $table) {
            $table->string('token_type')->default('Bearer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tokens', function (Blueprint $table) {
            $table->dropColumn('token_type');
        });
    }
}
