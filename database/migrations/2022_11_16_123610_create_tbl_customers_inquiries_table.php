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
        Schema::create('tbl_customers_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_details', 100);
            $table->string('dealership', 30);
            $table->string('inquiry_type', 30);
            $table->string('status', 30);
            $table->string('notes', 100);
            $table->dateTime('date');
            $table->integer('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customers_inquiries');
    }
};
