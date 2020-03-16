<?php

use Illuminate\Database\Seeder;
use App\Baptismal;

class BaptismalsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Baptismal::class, 10)->create();
    }
}
