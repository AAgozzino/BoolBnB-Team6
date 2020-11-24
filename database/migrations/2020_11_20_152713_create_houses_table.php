<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->constrained();
            $table->float('latitude', 8,6);
            $table->float('longitude', 9,6);
            $table->string('address');
            $table->text('description', 500);
            $table->string('title', 70);
            $table->tinyInteger('rooms');
            $table->tinyInteger('guests');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('beds');
            $table->tinyInteger('bathrooms');
            $table->smallInteger('mq');
            $table->float('price', 6,2);
            $table->boolean('visible')->default(true);
            $table->string('slug')->unique();
            $table->string('cover_img')->nullable();
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
        Schema::dropIfExists('houses');
    }
}
