<?php

use App\ContactReason;
use Illuminate\Database\Seeder;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactReason::create(['motivo' => 'Dúvida']);
        ContactReason::create(['motivo' => 'Elogio']);
        ContactReason::create(['motivo' => 'Reclamação']);
    }
}
