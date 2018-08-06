<?php

namespace JwtApp\Infrastructure\Domain\Model\User;

use JwtApp\Domain\Model\User\HashedUserPassword;
use JwtApp\Domain\Model\User\NotHashedUserPassword;
use JwtApp\Domain\Model\User\PasswordHashing;
use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;

class BasicPasswordHashing extends BasePasswordEncoder implements PasswordHashing
{
    public function hash(string $password): HashedUserPassword
    {
        return new HashedUserPassword(password_hash($password, PASSWORD_DEFAULT));
    }

    public function verify(NotHashedUserPassword $plainPassword, HashedUserPassword $hashedPassword): bool
    {
        return password_verify(
            (string)$plainPassword,
            (string)$hashedPassword
        );
    }

    /**
     * Encodes the raw password.
     *
     * @param string $raw The password to encode
     * @param string $salt The salt
     *
     * @return string The encoded password
     */
    public function encodePassword($raw, $salt)
    {
        return $this->hash($raw)->password();
    }

    /**
     * Checks a raw password against an encoded password.
     *
     * @param string $encoded An encoded password
     * @param string $raw A raw password
     * @param string $salt The salt
     *
     * @return bool true if the password is valid, false otherwise
     */
    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $this->verify(new NotHashedUserPassword($raw), new HashedUserPassword($encoded));
    }
}
