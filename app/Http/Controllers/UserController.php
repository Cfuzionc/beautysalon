<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = User::all();
        return view('pages.laravel-examples.user-management', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $request->validate($this->rules());
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function show(int $id): RedirectResponse
    {
        return back();
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|Factory|Application
    {
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $inputs = $request->validate($this->rules($user));

        $user->update($inputs);

        return back()->with('message', 'Successfully updated profile!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();

        return back()->with('message', 'Successfully deleted user!');
    }

    protected function rules($user = null): array
    {
        return [
            "email" => ['required', 'max:255', 'email:rfc,dns', Rule::unique('users', 'email')->ignore(optional($user)->id)],
            "name" => ['required', 'max:255'],
            "phone" => ['required', 'numeric', 'digits:10'],
            "location" => ['string', 'max:30'],
            "about" => ['string', 'max:255'],
        ];
    }


}
