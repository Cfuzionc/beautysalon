<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use Label84\HoursHelper\Facades\HoursHelper;

class MakeReservationComponent extends Component
{

    public $date;
    public $hours = [];

    public function mount()
    {
        //
    }

    public function render()
    {
        $employees = config('reservation.employees', []);

        return view('livewire.make-reservation-component', compact('employees'));
    }

    public function updatedDate()
    {
        $this->hours = [];

        $hours = HoursHelper::create(config('reservation.workhours.begin'), config('reservation.workhours.end'), config('reservation.workhours.appointmenttime'));

        $reservations = Reservation::whereDate('date', today())->get();

        foreach($reservations as $reservation)
        {
            $hours = $hours->filter(function ($item) use($reservation) {
                return $reservation->begin != $item;
            });
        }

        $this->hours = $hours;
    }
}
