<?php
namespace Gap\Security;

// How to properly add CSRF token using PHP
// http://stackoverflow.com/questions/6287903/how-to-properly-add-csrf-token-using-php
// CSRF Token necessary when using Stateless(= Sessionless) Authentication?
// http://stackoverflow.com/questions/21357182/csrf-token-necessary-when-using-stateless-sessionless-authentication

// Stop using JWT for sessions
// http://cryto.net/~joepie91/blog/2016/06/13/stop-using-jwt-for-sessions/

// hash_equals
// https://secure.php.net/hash_equals

class CsrfProvider
{
    public function token(): string
    {
        $token = bin2hex(random_bytes(8));
        return $token;
    }

    public function verify(string $postToken, string $sessionToken): bool
    {
        return hash_equals(
            $postToken,
            $sessionToken
        );
    }
}
