<?php

namespace JwtApp\Domain\Model\User;

interface UserFactory
{
    public function create(UserId $userId, UserEmail $email, HashedUserPassword $password): User;
}
