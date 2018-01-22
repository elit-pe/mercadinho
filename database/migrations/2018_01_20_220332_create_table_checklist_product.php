<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChecklistProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_product', function (Blueprint $table) {
            $table->integer('checklist_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('checklist_id')->references('id')->on('checklists');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::table('checklist_product', function (Blueprint $table) {
            $table->dropForeign(['checklist_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('checklist_product');
    }
}
