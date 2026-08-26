<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();

    if ($user->isAdmin()) {
        return view('admin.dashboard');
    }

    return view('customer.dashboard');
}
}
