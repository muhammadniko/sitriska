<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiskLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('T_RiskLevels')->insert([
            ['tingkat_risiko' => 'Renda','zona' => 'Zona C','color' => '#35fc03'],
            ['tingkat_risiko' => 'Sedan','zona' => 'Zona B','color' => '#fcec03'],
            ['tingkat_risiko' => 'Tingg','zona' => 'Zona A','color' => '#fc0303'],
        ]);
    }
}
