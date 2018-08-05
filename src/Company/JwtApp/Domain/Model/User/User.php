<?php

namespace JwtApp\Domain\Model\User;

class User
{
    protected $utenteId;
    protected $email;
    protected $password;

    public function __construct(UserId $utenteId, UserEmail $email, HashedUserPassword $password)
    {
        $this->utenteId = $utenteId;
        $this->email = $email;
        $this->password = $password;
    }
}
