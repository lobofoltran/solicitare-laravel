<?php

namespace App\Actions\Fortify;

use App\Models\Empresas;
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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'cnpj'      => ['required', 'string', 'max:15', 'exists:empresas'],
            'matricula' => ['required', 'string', 'max:25'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => $this->passwordRules(),
            'terms'     => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'empresa_id' => Empresas::where('cnpj', '=', $input['cnpj'])->first()->id,
            'matricula'  => $input['matricula'],
            'name'       => $input['name'],
            'email'      => $input['email'],
            'password'   => Hash::make($input['password']),
            'func'       => '1',
        ]);
    }
}
