<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateUniversityLogosSeeder extends Seeder
{
    public function run(): void
    {
        $universityLogos = [
            1 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Harvard_University_coat_of_arms.svg/200px-Harvard_University_coat_of_arms.svg.png',
            2 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/200px-Seal_of_Leland_Stanford_Junior_University.svg.png',
            3 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/200px-MIT_logo.svg.png',
            4 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/200px-Oxford-University-Circlet.svg.png',
            5 => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/University_of_Cambridge_logo.svg/200px-University_of_Cambridge_logo.svg.png',
            6 => 'https://www.iimb.ac.in/sites/default/files/2018-08/IIMB-Logo.png',
            7 => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Indian_Institute_of_Technology_Delhi_Logo.svg/200px-Indian_Institute_of_Technology_Delhi_Logo.svg.png',
            8 => 'https://www.xlri.ac.in/media/image/xlri-logo.png',
        ];

        foreach ($universityLogos as $id => $logoUrl) {
            DB::table('universities')
                ->where('id', $id)
                ->update(['logo' => $logoUrl]);
        }

        $this->command->info('Updated ' . count($universityLogos) . ' universities with logos');
    }
}
