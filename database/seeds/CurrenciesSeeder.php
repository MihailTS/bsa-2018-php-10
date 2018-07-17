<?php

use App\Entity\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class,10)->create();
    }
}
