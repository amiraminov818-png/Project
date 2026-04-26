<?php

namespace App\Services;

use App\Http\Requests\ProfileUpdateRequest;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Hash;


class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function update(array $data, User $user)
    {
        if
        (!empty($data['password']))
        {
            $data
            ['password'] = Hash::make($data['password']);
        }

        else
        {
           unset($data['password']);
        }

        $user->fill($data);

        if
        ($user->isDirty('email'))
        {
            $user->email_verified_at = null;
        }

        $user->save();
        return $user;
    }
}
