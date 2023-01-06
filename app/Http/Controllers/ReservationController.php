<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Component\Console\Input\Input;
use Label84\HoursHelper\Facades\HoursHelper;

class ReservationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $this->middleware(['auth']);

        $hours = HoursHelper::create(config('reservation.workhours.begin'), config('reservation.workhours.end'), config('reservation.workhours.appointmenttime'));
        $reservations = Reservation::where('date', '>=', now())->get();
        // dd($hours, $reservations);
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    #[NoReturn] public function store(Request $request): void
    {
        $this->middleware(['auth']);

        $request->validate([
            "start_date" => ['string', 'required'],
            "start_time" => ['string', 'required']
        ]);
        dd('test');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $reservation = Reservation::findOrFail($id);

        if($reservation->delete()) return redirect()->back()->with('success', 'Column deleted successfully!');

        return redirect()->back()->with('error', "An unexpected error occurred.");
    }
}
