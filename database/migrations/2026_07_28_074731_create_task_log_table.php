<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_log', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('id_task', 20);
            $table->integer('id_status');
            $table->dateTime('timestamp');

            $table->foreign('id_task')->references('id')->on('project_task')->onDelete('cascade');
            $table->foreign('id_status')->references('id_status')->on('task_status')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_log');
    }
};
