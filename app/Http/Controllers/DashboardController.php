<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->has('search'), function($query) use ($request) {
                $search = $request->get('search');
                $query->where('first_name', 'like', "%{$search}%");
                $query->orWhere('last_name', 'like', "%{$search}%");
            })
            ->paginate(50)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'country' => $user->country,
                'city' => $user->city,
                'post_code' => $user->post_code,
                'street' => $user->street,
            ]);

        return Inertia::render('Dashboard', [
            'users' => $users,
            'filters' => $request->only(['search']),
        ]);
    }
}
