<?php

namespace App\Models\Role;


class Role
{
    private RoleId $id;
    private RoleType $role_type;
    private string $description;

    /**
     * @param RoleId $id
     * @param RoleType $role_type
     * @param string $description
     */
    public function __construct(RoleId $id, RoleType $role_type, string $description)
    {
        $this->id = $id;
        $this->role_type = $role_type;
        $this->description = $description;
    }

    /**
     * @return RoleId
     */
    public function getId(): RoleId
    {
        return $this->id;
    }

    /**
     * @return RoleType
     */
    public function getRoleType(): RoleType
    {
        return $this->role_type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
