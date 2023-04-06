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
            $table->foreignId('user_id')->constrained('users');
            $table->string('title', 255);
            $table->enum('faculty', ['feco', 'flaw', 'feng', 'fmed', 'fagr', 'fedu', 'fsoc', 'fmat', 'focs', 'foph']);
            $table->text('abstract');
            $table->enum('item_type', ['ug', 'ms', 'phd']);
            $table->date('published_date')->nullable()->format('Y-m-d');
            $table->string('filename', 255);
            $table->enum('status', ['Pending', 'Accepted', 'Rejected'])->default('Pending');
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
