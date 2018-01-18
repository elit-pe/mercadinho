<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOwnerIdMarketplace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketplaces', function($table) {
            $table->integer('owner_id')->after('id')->unsiged();
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->boolean('active')->after('name')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marketplaces', function($table) {
            $table->dropColumn('owner_id');
            $table->dropColumn('active');
        });
    }
}
