<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {

        $query = Attendance::with('user'); // Eager load user data

        if ($request->search) {
            $query->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%") // Search user name
                    ->orWhere('email', 'like', "%{$request->search}%"); // or search user email
            });
        }

        $attendances = $query->paginate(10)->appends(request()->query()); // Pagination

        $attendances = AttendanceResource::collection($attendances); // Convert to resources (optional)

        return view('pages.admin.attendance.index', compact('attendances'));
    }

    public function view($id)
    {
        $agent = auth()->user();

        // Get the current month, previous month, and next month
        $currentMonth = Carbon::now()->startOfMonth();
        $previousMonth = $currentMonth->copy()->subMonth();
        $nextMonth = $currentMonth->copy()->addMonth();

        // Fetch attendance records for the current month, previous month, and next month
        $attendances = Attendance::where('user_id', $id)
            ->whereBetween('date', [$previousMonth, $nextMonth->endOfMonth()])
            ->get();

        $attendanceArray = [];

        foreach ($attendances as $attendance) {
            $checkInTime = Carbon::parse($attendance->check_in);
            if ($checkInTime->hour >= 11) {
                $attendance->status = 'half_day';
            }
            if (!$attendance->check_out) {
                $attendanceArray[$attendance->date->format('Y-m-d')] = 'absent';
            } else {
                $attendanceArray[$attendance->date->format('Y-m-d')] = $attendance->status;
            }
        }
        return view('pages.admin.attendance.view', compact('agent', 'attendanceArray'));
    }
}
