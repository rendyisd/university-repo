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
        Schema::create('author_document', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('document_id')->constrained('documents');
            $table->enum('status', ['Main', 'Contributor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_document');
    }
};
