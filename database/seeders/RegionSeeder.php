<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class RegionSeeder extends Seeder
{
    private static array $provinsi = [
        "ACEH",
        "SUMATERA UTARA",
        "SUMATERA BARAT",
        "RIAU",
        "JAMBI",
        "SUMATERA SELATAN",
        "BENGKULU",
        "LAMPUNG",
        "KEPULAUAN BANGKA BELITUNG",
        "KEPULAUAN RIAU",
        "DKI JAKARTA",
        "JAWA BARAT",
        "JAWA TENGAH",
        "DI YOGYAKARTA",
        "JAWA TIMUR",
        "BANTEN",
        "BALI",
        "NUSA TENGGARA BARAT",
        "NUSA TENGGARA TIMUR",
        "KALIMANTAN BARAT",
        "KALIMANTAN TENGAH",
        "KALIMANTAN SELATAN",
        "KALIMANTAN TIMUR",
        "KALIMANTAN UTARA",
        "SULAWESI UTARA",
        "SULAWESI TENGAH",
        "SULAWESI SELATAN",
        "SULAWESI TENGGARA",
        "GORONTALO",
        "SULAWESI BARAT",
        "MALUKU",
        "MALUKU UTARA",
        "PAPUA BARAT",
        "PAPUA",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $payload = [];
        foreach (self::$provinsi as $item) {
            $payload[] = [
                "id" => Uuid::uuid4()->toString(),
                "provinsi" => $item
            ];
        }
        DB::table('region')->upsert($payload, "id");
    }
}
