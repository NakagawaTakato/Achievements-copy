<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_authors', function (Blueprint $table) {
            $table->id();
            $table->string('name_send')->nullable();
            $table->date('date')->nullable();
            $table->foreignId('wrapper_id')->constrained()->cascadeOnDelete();
            $table->foreignId('number_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('my_authors');
    }
}
