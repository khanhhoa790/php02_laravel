<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('title', 176);
            // $table->string('slug', 176)->unique();
            // $table->text('content');
            // $table->string('photo')->nullable();
            // $table->string('source')->nullable();
            // $table->string('categories');
            // $table->bigInteger('creator');
            $table->string('name', 191)->collation('utf8mb4_unicode_ci');

            $table->string('email', 191)->unique()->collation('utf8mb4_unicode_ci');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191)->collation('utf8mb4_unicode_ci');
            $table->rememberToken()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            //$table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
