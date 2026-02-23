<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('commerce_order')->unique(); // Tu ID de orden
            $table->string('flow_order')->nullable();   // FlowOrder devuelto por Flow
            $table->string('email');
            $table->integer('amount');
            $table->string('currency', 10)->default('CLP');
            $table->tinyInteger('status')->default(1); // 1=pendiente, 2=pagado, 3=rechazado, 4=anulado
            $table->string('subject')->nullable();
            $table->string('optional')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
