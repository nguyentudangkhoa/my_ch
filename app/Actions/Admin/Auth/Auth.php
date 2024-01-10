<?php

namespace App\Actions\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth as LaravelAuth;
use Illuminate\Support\Facades\Hash;

class Auth
{
    /**
     * Invoke Auth
     *
     * @param array $request
     *
     * @return bool
     */
    public function __invoke(array $request): bool
    {
        if (! $user = User::where('user_name', $request['user_name'])->first()) {
            return false;
        }

        if (! $user->is_chage_password && $user->password == md5($request['password'])) {
            $user->update([
                'password' => Hash::make($request['password']),
            ]);
        }

        if (! LaravelAuth::attempt(['user_name' => $request['user_name'], 'password' => $request['password']])) {
            return false;
        }

        request()->session()->regenerate();

        return true;
    }
}
