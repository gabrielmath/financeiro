<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned()->index('input_outputs_category_index');
            $table->integer('expiration_day');
            $table->boolean('type')->default(false)->index('input_outputs_type_index');
            $table->boolean('is_unique_pay')->default(true);
            $table->integer('amount_installments')->default(1);
            $table->decimal('total_value',10,2);
            $table->boolean('is_finalized')->default();
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
        Schema::dropIfExists('input_outputs');
    }
}
