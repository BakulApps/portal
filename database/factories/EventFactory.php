<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $galery = ['assets/fronted/img/event/event-gallery-1.jpg', 'assets/fronted/img/event/event-gallery-2.jpg'];
        return [
            'event_image'   => null,
            'event_name'    => $this->faker->sentence,
            'event_content' => $this->faker->paragraph(40),
            'event_place'   => $this->faker->city,
            'event_time'    => $this->faker->time('H:i:s'),
            'event_date'    => $this->faker->date('Y-m-d'),
            'event_galery'  => json_encode($galery)
        ];
    }
}
