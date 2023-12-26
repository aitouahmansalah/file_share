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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('titre',150);
            $table->text('description');
            $table->integer('user_id');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('categorie_id');
           // $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('document');
            $table->integer('downloads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
