<?php

namespace JwtApp\Domain\Model\Role;

class Role
{
    private const ROLE_USER = 'user';

    protected $name;

    protected function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function user()
    {
        return new self(self::ROLE_USER);
    }

    public function type(): string
    {
        return $this->name;
    }
}
