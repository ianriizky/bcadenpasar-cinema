<?php

namespace App\Models\Concerns\User;

use Illuminate\Support\Facades\Hash;

/**
 * @property string $username
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon $email_verified_at
 * @property string $password
 * @property-read string $remember_token
 *
 * @see \App\Models\User
 */
trait Attribute
{
    /**
     * Set "password" attribute value.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);

        return $this;
    }
}
