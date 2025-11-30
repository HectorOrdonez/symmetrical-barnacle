<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function new(): Response
    {
        $num = random_int(1, 10000);
        return Inertia::render('Users/New', [
            'user' => [
                'first_name' => 'first name ' . $num,
                'last_name' => 'last name' . $num,
                'email' => 'email' . $num . '@dot.com',
                'country' => 'NL',
                'city' => 'Woah' . $num,
                'post_code' => '1234' . $num,
                'street' => 'Woah Street ' . $num,
            ],
        ]);
    }

    public function show(User $user): Response
    {
        return Inertia::render('Users/Show', [
            'user' => $this->userToArray($user),
        ]);
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Users/Edit', [
            'user' => $this->userToArray($user),
        ]);
    }

    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'street' => 'required|string|max:255',
        ]);

        $user->fill($validatedData);
        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'street' => 'required|string|max:255',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.show', $user->id);
    }

    private function userToArray(User $user): array
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'country' => $user->country,
            'city' => $user->city,
            'post_code' => $user->post_code,
            'street' => $user->street,
        ];
    }
}
