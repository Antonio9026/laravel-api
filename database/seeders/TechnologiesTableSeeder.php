<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ["JS", "Vue", "PHP", "CSS", "HTML", "Bootstrap", "Laravel", "NodeJS"];
        foreach ($technologies as  $technology) {
            Technology::create(["name" => $technology]);
        }
    }
}
