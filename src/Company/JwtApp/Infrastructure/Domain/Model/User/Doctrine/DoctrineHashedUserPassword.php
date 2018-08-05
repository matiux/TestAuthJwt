<?php

namespace JwtApp\Infrastructure\Domain\Model\User\Doctrine;

use JwtApp\Domain\Model\User\HashedUserPassword;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class DoctrineHashedUserPassword extends Type
{
    const MYTYPE = 'HashedUserPassword';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new HashedUserPassword($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string)$value;
    }

    public function getName()
    {
        return self::MYTYPE;
    }
}
