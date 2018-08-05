<?php

namespace JwtApp\Domain\Model\User;

class HashedUserPassword extends UserPassword
{
    protected function isPasswordValid(string $password): bool
    {
        /**
         * TODO - ?
         */

        return true;
    }
}
