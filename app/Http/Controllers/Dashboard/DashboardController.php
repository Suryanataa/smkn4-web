<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard')
            ->with([
                'title' => 'Dahsboard',
                'active' => 'Dashboard',
                'subActive' => '',
            ]);
    }
}
