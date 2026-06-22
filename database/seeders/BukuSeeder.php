<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\factory as faker;
class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => fake()->sentence(3),
                'pengarang' => fake()->name(),
                'penerbit' => fake()->company(),
                'genre' => fake()->randomElement([
                'Novel',
                'Komik',
                'Pendidikan',
                'Sejarah',
                'Teknologi',
                'Agama'
        ])]);
        } 
    }
}
