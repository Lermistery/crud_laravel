<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('project_task', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('id_project', 20);
            $table->string('task', 255);
            $table->date('deadline');
            $table->string('priority', 50);
            $table->integer('created_by');
            $table->integer('assigned');
            
            $table->foreign('id_project')->references('id_project')->on('project')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('project_task');
    }
};