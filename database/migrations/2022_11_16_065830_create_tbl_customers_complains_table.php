<?php

use Faker\Provider\ar_EG\Text;
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
        Schema::create('tbl_customers_complains', function (Blueprint $table) {
            $table->id();
            $table->string('voc', 100);
            $table->string('dealership', 30);
            $table->string('complaint_type', 30);
            $table->string('owner_vehicle', 30);
            $table->string('complaint_priority', 10);
            $table->string('notes', 90);
            $table->string('document', 60);
            $table->integer('customer_id');
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
        Schema::dropIfExists('tbl_customers_complains');
    }
};
