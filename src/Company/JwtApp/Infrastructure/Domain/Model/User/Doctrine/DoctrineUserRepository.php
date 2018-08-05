<?php

namespace JwtApp\Infrastructure\Domain\Model\User\Doctrine;

use Doctrine\ORM\EntityRepository;
use JwtApp\Domain\Model\User\User;
use JwtApp\Domain\Model\User\UserId;
use JwtApp\Domain\Model\User\UserRepository;

class DoctrineUserRepository extends EntityRepository implements UserRepository
{
    public function nextIdentity(): UserId
    {
        return UserId::create();
    }

    public function add(User $user): void
    {
        $this->getEntityManager()->persist($user);

        $this->getEntityManager()->flush();
    }
}
