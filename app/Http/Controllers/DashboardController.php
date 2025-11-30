<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(50);

        return Inertia::render('Dashboard', [
            'users' => $users,
        ]);
    }
}
