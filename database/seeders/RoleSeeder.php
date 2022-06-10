<?php

namespace Database\Seeders;

use App\Models\Role\RoleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        DB::table('role')->upsert([
            [
                'id' => "567d162b-ca82-4c48-9c1a-71abdb68a862",
                'role_type' => RoleType::EVENT_ORGANIZER,
                'description' => "Orang yang punya dan bertugas untuk memulai acara"
            ],
            [
                'id' => "c1377dd2-0e4e-48ed-bbff-9cbd85d0cd45",
                'role_type' => RoleType::VOLUNTEER,
                'description' => "Relawan untuk membantu jalannya acara"
            ],
            [
                'id' => "abbf2cd2-3207-4a6f-b950-7c61e2db9703",
                'role_type' => RoleType::SUPPLIER,
                'description' => "Yang mengsupply biji pohon untuk ditanam"
            ],
            [
                'id' => "690a5c53-24c4-4781-a14d-bc1a0d09de13",
                'role_type' => RoleType::TRANSPORTER,
                'description' => "Yang mengantar biji pohon untuk ditanam"
            ],
        ], 'id');
    }
}
