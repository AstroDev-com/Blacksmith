<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Sale; // Removed
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use App\Models\Purchase; // Removed as well
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Added Auth facade
use App\Models\User; // Add User model
use Spatie\Activitylog\Models\Activity; // Keep Activity for potential future use, but remove related logic for now

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now = Carbon::now();
        $today = Carbon::today(); // Get today's date

        // Calculate total users (potentially for admin view)
        $totalUsers = User::count();

        $latestActivities = collect(); // Placeholder: Initialize as empty collection for now
        $userTripsForSelect = collect(); // Placeholder
        $tripsChartLabels = []; // Placeholder
        $tripsChartValues = []; // Placeholder

        // Pass data to the view - Only pass necessary data for now
        return view('admin.home', compact(
            'totalUsers' // Pass total users
        ));
    }

    /**
     * Get latest activities as HTML. (Can be removed if dashboard loads all data initially)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getActivityData(Request $request)
    {
        // This function might be redundant now or could be adapted
        // to fetch specific activity types via AJAX if needed.
        // For now, returning an empty successful response or an error.
        Log::warning('DashboardController@getActivityData is called but likely deprecated or needs rework for clinic system.');
        return response()->json(['html' => '<p>No activities available yet.</p>']); // Updated message
    }
}
