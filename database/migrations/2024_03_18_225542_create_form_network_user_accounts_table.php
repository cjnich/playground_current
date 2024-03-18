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
        Schema::create('form_network_user_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_type');
            $table->text('first_name');
            $table->text('last_name');
            $table->string('email')->unique();
            $table->string('job_description')->nullable();
            $table->string('department')->nullable();
            $table->unsignedBigInteger('telphone_access_level')->nullable();
            $table->string('telphone_ext')->nullable();

            $table->unsignedBigInteger('manager');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('manager')->references('id')->on('users');
            $table->foreign('form_type')->references('id')->on('form_types');
            $table->foreign('telphone_access_level')->references('id')->on('access_level_telephones');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_network_user_accounts');
    }
};
