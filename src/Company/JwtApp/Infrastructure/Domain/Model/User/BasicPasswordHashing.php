<?php

namespace JwtApp\Infrastructure\Domain\Model\User;

use JwtApp\Domain\Model\User\HashedUserPassword;
use JwtApp\Domain\Model\User\NotHashedUserPassword;
use JwtApp\Domain\Model\User\PasswordHashing;

class BasicPasswordHashing implements PasswordHashing
{
    public function hash(string $password): HashedUserPassword
    {
        return new HashedUserPassword(password_hash($password, PASSWORD_DEFAULT));
    }

    public function verify(NotHashedUserPassword $plainPassword, HashedUserPassword $hashedPassword): bool
    {
        return password_verify(
            (string)$plainPassword,
            (string)$hashedPassword
        );
    }
}
