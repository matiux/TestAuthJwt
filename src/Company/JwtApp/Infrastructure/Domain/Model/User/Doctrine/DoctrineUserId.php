<?php

namespace JwtApp\Infrastructure\Domain\Model\User\Doctrine;

use DDDStarterPack\Infrastructure\Domain\DoctrineEntityId;

class DoctrineUserId extends DoctrineEntityId
{
    public function getName()
    {
        return 'UserId';
    }

    protected function getNamespace(): string
    {
        return 'JwtApp\Domain\Model\User';
    }
}
