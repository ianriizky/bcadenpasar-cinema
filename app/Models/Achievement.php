<?php

namespace App\Models;

use App\Infrastructure\Contracts\Model\HasCreatedByAttribute;
use App\Infrastructure\Database\Eloquent\Model;
use App\Listeners\FillCreatedByWhenCreatingModel;
use App\Support\Model\HandleCreatedByAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model implements HasCreatedByAttribute
{
    use HasFactory,
        HandleCreatedByAttribute,
        Concerns\Achievement\Attribute,
        Concerns\Achievement\Event,
        Concerns\Achievement\Relation;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'achieved_date',
        'amount',
        'note',
    ];

    /**
     * {@inheritDoc}
     */
    protected $casts = [
        'achieved_date' => 'datetime',
        'amount' => 'integer',
    ];

    /**
     * {@inheritDoc}
     */
    protected $dispatchesEvents = [
        'creating' => FillCreatedByWhenCreatingModel::class,
    ];
}
