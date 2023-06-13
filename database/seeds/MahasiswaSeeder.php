<?php
//MEMBUAT ISI DATA TABEL DATABASE
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        for($i=1;$i<=20;$i++)
        {
            DB::table('mahasiswa')->insert([
                'nim' => $faker->randomNumber(8, true),
                'nama' => $faker->name(),
                'gender' => $faker->lexify(),
                'prodi' => $faker->sentence(1),
                'minat' => $faker->sentence(2),
            ]);
        }
        
    }
}
