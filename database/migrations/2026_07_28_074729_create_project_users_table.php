<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('project_users', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('id_project', 20);
            $table->integer('id_users');
            
            $table->foreign('id_project')->references('id_project')->on('project')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('project_users');
    }
};