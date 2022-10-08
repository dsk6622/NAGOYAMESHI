<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->default('');
            $table->text('description');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->integer('lowest_price')->unsigned();
            $table->integer('highest_price')->unsigned();
            $table->string('postal_code');
            $table->string('address');
            $table->string('phone_number');
            $table->string('regular_holiday');
            $table->foreignId('category_id')->constrained()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('restaurants');
    }
};
