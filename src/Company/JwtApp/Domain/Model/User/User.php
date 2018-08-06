<?php

namespace JwtApp\Domain\Model\User;

use JwtApp\Domain\Model\Role\Role;

class User
{
    protected $userId;
    protected $email;
    protected $password;
    protected $role;

    public function __construct(UserId $userId, UserEmail $email, HashedUserPassword $password, Role $role)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }
}
