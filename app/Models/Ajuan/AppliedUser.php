<?php

namespace App\Models\Ajuan;

use App\Models\User\UserId;

class AppliedUser
{
    private UserId $user_id;

    /**
     * @param UserId $user_id
     */
    public function __construct(UserId $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

}
