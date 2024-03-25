<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['label' => 'Front End', 'color' => '#00FF00']);
        Type::create(['label' => 'Back End', 'color' => '#0000FF']);
        Type::create(['label' => 'UI/UX', 'color' => '#FFC0CB']);
        Type::create(['label' => 'Design', 'color' => '#FFA500']);


    }
}
