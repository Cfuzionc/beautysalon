<?php

namespace App\Http\Livewire;
{{  }}
use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;
use Label84\HoursHelper\Facades\HoursHelper;

class MakeReservationComponent extends Component
{

    public $date;
    public $hours = [];

    public $start_time;
    public $preffered_employee;

    public $reservation;
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

    public function storeReservation()
    {
        if(! auth()->check()) return false;

        Validator::make(
            [
                'start_time' => $this->start_time,
                'date' => $this->date,
            ],  $this->rules());

        $this->reservation = Reservation::create([
            "user_id" => auth()->user()->id,
            "begin" => $this->start_time,
            "end" => $this->start_time,
            "date" => $this->date,
            "preffered_employee" => $this->preffered_employee ?? NULL,
        ]);
    }

    protected function rules()
    {
        return [
            "date" => ['string', 'required'],
            "start_time" => ['string', 'required']
        ];
    }
}
