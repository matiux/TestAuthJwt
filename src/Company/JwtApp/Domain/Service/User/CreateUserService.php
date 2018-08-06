<?php

namespace JwtApp\Domain\Service\User;

use JwtApp\Domain\Model\Role\Role;
use JwtApp\Domain\Model\User\NotHashedUserPassword;
use JwtApp\Domain\Model\User\PasswordHashing;
use JwtApp\Domain\Model\User\User;
use JwtApp\Domain\Model\User\UserEmail;
use JwtApp\Domain\Model\User\UserFactory;
use JwtApp\Domain\Model\User\UserRepository;

class CreateUserService
{
    private $userFactory;
    private $userRepository;
    private $passwordHashing;

    public function __construct(UserFactory $userFactory, UserRepository $userRepository, PasswordHashing $passwordHashing)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
        $this->passwordHashing = $passwordHashing;
    }

    public function execute(UserEmail $email, NotHashedUserPassword $password, Role $role): User
    {
        $userId = $this->userRepository->nextIdentity();
        $hashedPassword = $this->passwordHashing->hash($password);

        $user = $this->userFactory->create($userId, $email, $hashedPassword, $role);

        $this->userRepository->add($user);

        return $user;
    }
}
