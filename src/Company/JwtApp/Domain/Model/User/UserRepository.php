<?php

namespace JwtApp\Domain\Model\User;

interface UserRepository
{
    public function nextIdentity(): UserId;

    public function add(User $user): void;
}
