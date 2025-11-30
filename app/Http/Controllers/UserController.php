<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'country' => $user->country,
                'city' => $user->city,
                'post_code' => $user->post_code,
                'street' => $user->street,
            ],
        ]);
    }
}
