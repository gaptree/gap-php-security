<?php

namespace Gap\Security;

use Gap\Valid\ValidPassword;

class PasshashProvider
{
    public function hash(string $password): string
    {
        $validator = new ValidPassword();
        $validator->assert($password);

        // Options:
        //  - salt: a random salt will be generated
        //  - cost: a default value of 10 will be used
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function randCode(int $cost = 8): string
    {
        return bin2hex(random_bytes($cost));
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
