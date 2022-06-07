<?php

namespace App\Models\User;

use App\Models\Region\RegionId;
use App\Models\Role\RoleId;
use DateTime;

class User
{
    private UserId $id;
    private RoleId $role_id;
    private RegionId $region_id;
    private DateTime $tanggal_lahir;
    private string $name;
    private string $username;

    /**
     * @param UserId $id
     * @param RoleId $role_id
     * @param RegionId $region_id
     * @param DateTime $tanggal_lahir
     * @param string $name
     * @param string $username
     */
    public function __construct(UserId $id, RoleId $role_id, RegionId $region_id, DateTime $tanggal_lahir, string $name, string $username)
    {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->region_id = $region_id;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->name = $name;
        $this->username = $username;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return RoleId
     */
    public function getRoleId(): RoleId
    {
        return $this->role_id;
    }

    /**
     * @return RegionId
     */
    public function getRegionId(): RegionId
    {
        return $this->region_id;
    }

    /**
     * @return DateTime
     */
    public function getTanggalLahir(): DateTime
    {
        return $this->tanggal_lahir;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}
