<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'nrc_number' => $input['nationality'] == 'Myanmar' ? 'required' : '',
            'address' => $input['nationality'] == 'Myanmar' ? 'required' : '',
            'passport' => $input['nationality'] == 'Foreign' ? 'required' : '',
            'password' => $input['userOrGuest'] == 'User' ? $this->passwordRules(): '',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'role' => $input['userOrGuest'],
            'nationality' => $input['nationality'],
            'nrc_number' => $input['nrc_number'],
            'address' => $input['address'],
            'passport' => $input['passport'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
