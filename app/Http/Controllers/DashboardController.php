<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\User;
use App\Models\Branch;

class DashboardController extends Controller
{
    public function index()
    {
        $activeBranch = Branch::all()->count();
        $activeUsers = User::all()->count();
        $activeSuppliers = Supplier::where('status', 1)->count();

        return view('dashboard.index', compact('activeSuppliers', 'activeUsers', 'activeBranch'));
    }
}
