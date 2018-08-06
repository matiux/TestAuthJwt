<?php

namespace JwtApp\Infrastructure\Domain\Model\Role\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use JwtApp\Domain\Model\Role\Role;

class DoctrineRole extends Type
{
    const MYTYPE = 'Role';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $role = strtolower($value);

        return Role::$role();
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof Role) {
            return $value->type();
        }

        throw new \LogicException('Tipo non valido');
    }

    public function getName()
    {
        return self::MYTYPE;
    }
}
