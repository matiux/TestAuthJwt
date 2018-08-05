<?php

namespace JwtApp\Domain\Service\User;

use JwtApp\Domain\Model\User\NotHashedUserPassword;
use JwtApp\Domain\Model\User\PasswordHashing;
use JwtApp\Domain\Model\User\User;
use JwtApp\Domain\Model\User\UserEmail;
use JwtApp\Domain\Model\User\UserRepository;

class CreateUserService
{
    private $userRepository;
    private $passwordHashing;

    public function __construct(UserRepository $userRepository, PasswordHashing $passwordHashing)
    {
        $this->userRepository = $userRepository;
        $this->passwordHashing = $passwordHashing;
    }

    public function execute(UserEmail $email, NotHashedUserPassword $password): User
    {
        $userId = $this->userRepository->nextIdentity();
        $hashedPassword = $this->passwordHashing->hash($password);

        $user = new User($userId, $email, $hashedPassword);

        $this->userRepository->add($user);

        return $user;
    }
}
