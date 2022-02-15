<?php

namespace Database\Factories;

use App\Enum\Periodicity;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Branch;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @see \App\Models\Branch
 */
class EventFactory extends Factory
{
    /**
     * {@inheritDoc}
     */
    public function definition()
    {
        return [
            'name' => Str::limit($this->faker->word, 255, ''),
            'date' => Carbon::parse($this->faker->dateTimeBetween('-1 year', '+1 year')),
            'location' => $this->faker->city,
            'note' => $this->faker->word,
        ];
    }

    /**
     * Get the raw attributes generated by the factory for form purposes.
     *
     * @param  \App\Models\Branch|null  $branch
     * @return array
     */
    public function rawForm(Branch $branch = null): array
    {
        $data = $this->raw();

        if ($branch) {
            $data['branch_id'] = $branch->getKey();
        }

        $data['date'] = $data['date']->isoFormat(Event::DATE_FORMAT_ISO);

        return $data;
    }
}