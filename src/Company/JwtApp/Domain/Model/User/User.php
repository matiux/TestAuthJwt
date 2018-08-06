<?php

namespace JwtApp\Domain\Model\User;

class User
{
    protected $userId;
    protected $email;
    protected $password;

    public function __construct(UserId $userId, UserEmail $email, HashedUserPassword $password)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
    }
}
