<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Attendance;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $currentDate = Carbon::now();
        $formattedTime = $currentDate->format('H:i:s');

        Attendance::create([
                'user_id' => auth()->user()->id,
                'date' => $currentDate,
                'check_in' => $formattedTime,
                'check_out' => null,
                'status' => 1,

            ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $id = auth()->user()->id;
        $currentDate = Carbon::now();
        $formattedTime = $currentDate->format('H:i:s');

        Attendance::where('user_id' , $id)->update([
            'check_out' => $formattedTime,
        ]);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
