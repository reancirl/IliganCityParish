<?php

use App\Baptismal;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BaptismalsTableSeeder extends Seeder
{
    public function run()
    {
        // factory(Baptismal::class, 10)->create();

        Baptismal::create([
		    'first_name' => 'Reancirl',
			'middle_name' => 'Ces',
			'last_name' => 'Balaba',
			'gender' => 'Male',
			'parents_type_of_marriage' => 'Church',
			'place_of_birth' => 'Iligan City',
			'place_of_baptism' => 'San Roque Parish Church',
			'fathers_name' => 'Florencio Balaba',
			'mothers_maiden_name' => 'Charissa Janen Ces',
			'parents_address' => 'Sta. Filomena, Iligan City',
			'contact_number' => '09552719688',

			'date_of_birth' => Carbon::parse('1998-05-29'),
			'date_of_attending_seminar' => Carbon::parse('1998-12-01'),
			'date_of_baptism' => Carbon::parse('1998-12-25'),
		]);

		Baptismal::create([
		    'first_name' => 'Chermae',
			'middle_name' => 'Leong',
			'last_name' => 'Anobling',
			'gender' => 'Female',
			'parents_type_of_marriage' => 'Church',
			'place_of_birth' => 'Iligan City',
			'place_of_baptism' => 'San Lorenzo Ruiz Parish Church',
			'fathers_name' => 'Artcher Anobling',
			'mothers_maiden_name' => 'Lota Mae Leong',
			'parents_address' => 'Sta. Filomena, Iligan City',
			'contact_number' => '09352822067',

			'date_of_birth' => Carbon::parse('1998-10-06'),
			'date_of_attending_seminar' => Carbon::parse('1998-12-01'),
			'date_of_baptism' => Carbon::parse('1998-12-25'),
		]);

		Baptismal::create([
		    'first_name' => 'Jude Miguel',
			'middle_name' => 'Ces',
			'last_name' => 'Balaba',
			'gender' => 'Male',
			'parents_type_of_marriage' => 'Church',
			'place_of_birth' => 'Iligan City',
			'place_of_baptism' => 'St.Michael The Archangel Parish Church',
			'fathers_name' => 'Florencio Balaba',
			'mothers_maiden_name' => 'Charissa Janen Ces',
			'parents_address' => 'Sta. Filomena, Iligan City',
			'contact_number' => '09552719688',

			'date_of_birth' => Carbon::parse('2012-09-02'),
			'date_of_attending_seminar' => Carbon::parse('2013-09-01'),
			'date_of_baptism' => Carbon::parse('2013-09-29'),
		]);

		Baptismal::create([
		    'first_name' => 'Jaeric Miguel',
			'middle_name' => 'Ces',
			'last_name' => 'Balaba',
			'gender' => 'Male',
			'parents_type_of_marriage' => 'Church',
			'place_of_birth' => 'Iligan City',
			'place_of_baptism' => 'St.Michael The Archangel Parish Church',
			'fathers_name' => 'Florencio Balaba',
			'mothers_maiden_name' => 'Charissa Janen Ces',
			'parents_address' => 'Sta. Filomena, Iligan City',
			'contact_number' => '09352822067',

			'date_of_birth' => Carbon::parse('2003-09-26'),
			'date_of_attending_seminar' => Carbon::parse('2004-09-01'),
			'date_of_baptism' => Carbon::parse('2004-09-29'),
		]);
   	 }
}
