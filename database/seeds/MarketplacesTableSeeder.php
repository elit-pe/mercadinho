<?php

use Illuminate\Database\Seeder;

class MarketplacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Marketplace::class)->create(['name' => 'Mercadinho teste']);
    }
}
