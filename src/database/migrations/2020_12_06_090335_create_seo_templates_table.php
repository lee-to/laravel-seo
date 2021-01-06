<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_templates', function (Blueprint $table) {
            $table->id();

            $table->string("title")->nullable();

            $table->string("description")->nullable();

            $table->string("keywords")->nullable();

            $table->string("h1")->nullable();

            $table->longText("text")->nullable();

            $table->string("model_class");

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
        Schema::dropIfExists('seo_templates');
    }
}
