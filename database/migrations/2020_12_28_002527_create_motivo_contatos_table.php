<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateContactReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('reason', 20);
            $table->timestamps();
        });

        $seeder = new ContactReasonSeeder();
        $seeder->run();
        // Artisan::call('db:seed', [
        //     '--class' => 'ContactReasonSeeder',
        //     '--force' => 'true',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_reasons');
    }
}
