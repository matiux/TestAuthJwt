<?php

namespace JwtApp\Domain\Model\User;

use JwtApp\Domain\Model\Role\Role;

interface UserFactory
{
    public function create(UserId $userId, UserEmail $email, HashedUserPassword $password, Role $role): User;
}
