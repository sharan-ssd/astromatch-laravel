<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('xavier_reports', function (Blueprint $table) {
            $table->id('xavier_id');   // Primary key
            $table->integer('user_id');
            $table->string('report_name');
            $table->integer('whatsapp_sent_count')->default(0);
            $table->integer('email_sent_count')->default(0);
            $table->enum('status', [
                'pending',
                'processing',
                'completed',
                'failed',
            ])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xavier_reports');
    }
};
