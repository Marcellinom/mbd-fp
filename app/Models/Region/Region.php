<?php

namespace App\Models\Region;


class Region
{
    private RegionId $id;
    private string $provinsi;

    /**
     * @param RegionId $id
     * @param string $provinsi
     */
    public function __construct(RegionId $id, string $provinsi)
    {
        $this->id = $id;
        $this->provinsi = $provinsi;
    }

    /**
     * @return RegionId
     */
    public function getId(): RegionId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProvinsi(): string
    {
        return $this->provinsi;
    }
}
