<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('activity', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('id_task', 20);
            $table->dateTime('timestamp');
            $table->integer('id_user');
            $table->text('log');

            $table->foreign('id_task')->references('id')->on('project_task')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('activity');
    }
};