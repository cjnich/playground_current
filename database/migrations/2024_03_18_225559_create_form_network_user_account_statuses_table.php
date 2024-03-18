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
        Schema::create('form_network_user_account_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('form_id');
            $table->boolean('groups_allocated');
            $table->boolean('login_script');
            $table->boolean('home_directory_created');
            $table->boolean('email_account_created');
            $table->boolean('im_activated');
            $table->boolean('train_user_email_usage');
            $table->boolean('manager_informed');
            $table->boolean('user_informed');
            $table->timestamp('user_login');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('form_id')->references('id')->on('form_network_user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_network_user_account_statuses');
    }
};
