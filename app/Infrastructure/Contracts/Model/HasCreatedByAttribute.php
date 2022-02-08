<?php

namespace App\Infrastructure\Contracts\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property \App\Models\User $created_by
 */
interface HasCreatedByAttribute
{
    /**
     * Define an inverse one-to-one relationship with \App\Models\User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by(): BelongsTo;

    /**
     * Return \App\Models\User model relation value.
     *
     * @return \App\Models\User
     */
    public function getCreatedByRelationValue(): User;

    /**
     * Set \App\Models\User model relation value.
     *
     * @param  \App\Models\User  $user
     * @return $this
     */
    public function setCreatedByRelationValue(User $user);
}
