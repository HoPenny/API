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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->foreignId('cgy_id')->constrained();;
            $table->text('content');
            $table->string('pic', 255)->nullable();
            $table->integer('sort')->default(0);
            // $table->boolean('enabled')->default(true);
            $table->boolean('enabled')->default(1);
            // $table->string('status', 10)->default('draft');
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['cgy_id']);
        });

        Schema::dropIfExists('posts');
    }
};
