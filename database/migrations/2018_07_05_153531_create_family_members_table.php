<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->integer('user_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('code')->nullable();
            $table->string('full_name');
            $table->string('nick_name')->nullable();
            $table->year('year_of_date')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('photo_url')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('family_members');
    }
}
