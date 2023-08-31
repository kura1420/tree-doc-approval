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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('division');
            $table->string('dept');
            $table->string('name');
            $table->string('filename');
            $table->boolean('status')->default(false);
            $table->foreignId('reject_user_id')->nullable();
            $table->dateTime('reject_date')->nullable();
            $table->foreignId('approve_user_id')->nullable();
            $table->dateTime('approve_date')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
