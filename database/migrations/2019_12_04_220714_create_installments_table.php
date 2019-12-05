<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('input_output_id')->unsigned()->index('installments_input_output_index');
            $table->integer('month');
            $table->integer('year');
            $table->date('pay_day')->nullable();
            $table->decimal('value', 10, 2);
            $table->decimal('pay_value', 10, 2)->nullable();
            $table->integer('pay_type')->nullable();
            $table->boolean('is_ignored')->default(false);
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
        Schema::dropIfExists('installments');
    }
}
