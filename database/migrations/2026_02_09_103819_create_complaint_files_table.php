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
        Schema::create('complaint_files', function (Blueprint $table) {
           $table->id();
        $table->unsignedBigInteger('complaint_id');
        $table->string('file_name');
        $table->string('file_path');
        $table->timestamps();

        // علاقة المفتاح الخارجي مع جدول الشكاوى
        $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_files');
    }
};
