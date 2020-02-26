<?php

use Illuminate\Database\Seeder;
use App\Baptismal;

class BaptismalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Baptismal::class, 10)->create();
    }
}
