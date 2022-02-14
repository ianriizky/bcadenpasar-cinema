<?php

namespace App\Models;

use App\Events\CreatingBelongsToCreatedBy;
use App\Infrastructure\Contracts\Models\Relation\BelongsToBranch;
use App\Infrastructure\Contracts\Models\Relation\BelongsToCreatedBy;
use App\Infrastructure\Contracts\Models\Relation\HasManyAchievements;
use App\Infrastructure\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model implements BelongsToBranch, HasManyAchievements, BelongsToCreatedBy
{
    use HasFactory,
        Concerns\Event\Attribute,
        Concerns\Event\Relation;

    /**
     * Value of date format ISO.
     *
     * @var string
     */
    const DATE_FORMAT_ISO = 'dddd, DD MMMM YYYY';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'name',
        'date',
        'location',
        'note',
    ];

    /**
     * {@inheritDoc}
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * {@inheritDoc}
     */
    protected $dispatchesEvents = [
        'creating' => CreatingBelongsToCreatedBy::class,
    ];
}
