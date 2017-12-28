<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AuthPasswordRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $usersService = app('App\Helpers\Contracts\UserServiceContract');
        $user = $usersService->userByLoginOrEmail(request('login'));

        if (!$user) {
            return true;
        }

        return $usersService->preparePassword($user, $value) === $user->password;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Invalid credentials.';
    }
}
