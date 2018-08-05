<?php

namespace JwtApp\Domain\Model\User;

interface PasswordHashing
{
    public function verify(NotHashedUserPassword $plainPassword, HashedUserPassword $hashedPassword): bool;

    public function hash(string $password): HashedUserPassword;
}
