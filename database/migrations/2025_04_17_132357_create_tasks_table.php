<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\TaskStatusEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamp('deadline');
            $table->enum('status', array_column(TaskStatusEnum::cases(), 'value'))->default(TaskStatusEnum::Pending->value);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assigned_to_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assigned_to_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
