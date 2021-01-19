<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableContatosAddFkContactReasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_reason_id');
        });

        DB::statement('update contacts set contact_reason_id = reason');

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('contact_reason_id')->references('id')->on('contact_reason');
            $table->dropColumn('reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('reason');
            $table->dropForeign('contacts_contact_reason_id_foreign');
        });

        DB::statement('update contacts set reason = contact_reason_id');

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('contact_reason_id');
        });
    }
}
