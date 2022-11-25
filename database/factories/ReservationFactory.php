<?php

namespace Database\Factories;

use App\Models\User;
use Label84\HoursHelper\Facades\HoursHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hours = HoursHelper::create(config('reservation.workhours.begin'), config('reservation.workhours.end'), config('reservation.workhours.appointmenttime'));
        $begin = rand(0, (count($hours) - 2) );
        return [
            'user_id' => function() {
                return User::factory()->create()->id;
            },
            'preffered_employee' => null,
            'begin' => $hours[$begin],
            'end' => $hours[$begin + 1],
            'date' => fake()->dateTimeBetween('-30 years', "+30 years"),
        ];
    }

    /*
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('preffered_employee')->nullable();
            $table->time('begin');
            $table->time('end');
            $table->date('date');
    */
}
