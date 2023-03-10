<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('file')->nullable();
            $table->text('url')->nullable();


            $table->smallInteger('status')->default(1);
            $table->foreignId('registerUser_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('index_pdfs');
    }
}
