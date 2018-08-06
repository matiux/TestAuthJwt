<?php

namespace JwtApp\Infrastructure\Domain\Model\User\Doctrine;

use JwtApp\Domain\Model\Role\Role;
use JwtApp\Domain\Model\User\HashedUserPassword;
use JwtApp\Domain\Model\User\User;
use JwtApp\Domain\Model\User\UserEmail;
use JwtApp\Domain\Model\User\UserFactory;
use JwtApp\Domain\Model\User\UserId;

class DoctrineUserFactory implements UserFactory
{
    public function create(UserId $userId, UserEmail $email, HashedUserPassword $password, Role $role): User
    {
        $user = new DoctrineUser($userId, $email, $password, $role);

        return $user;
    }
}
