<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('template_name');
            $table->string('sender_account')->nullable();
            $table->text('content');
            $table->string('website_url')->nullable();
            $table->string('social_media')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            
            $table->timestamps();

            $table->unique(['template_name', 'user_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('client_email_template', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('email_template_id');
            $table->timestamps();

            $table->unique(['client_id', 'email_template_id']);

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('email_template_id')->references('id')->on('email_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_templates');
    }
}
