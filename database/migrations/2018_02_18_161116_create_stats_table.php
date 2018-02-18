<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->float('balance')->default(0);
            $table->float('avaliable_credit')->default(0);
            $table->float('current_due')->default(0);
            $table->float('past_due')->default(0);
            $table->string('terms');
            $table->float('asr')->default(0);
            $table->float('requests_cancelled')->default(0);
            $table->float('billed_minutes')->default(0);
            $table->float('total_calls')->default(0);
            $table->float('connected_calls')->default(0);
            $table->float('short_calls')->default(0);
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
        Schema::dropIfExists('stats');
    }
}
