<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephonies', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('full_name')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('registerUser_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('deletedUser_id')->nullable()->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telephonies');
    }
}
