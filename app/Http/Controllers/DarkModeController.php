<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    /**
     * Toggle the dark mode preference for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleDarkMode(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Toggle the dark mode preference
        $user->dark_mode = !$user->dark_mode;
        $user->save();

        // Return the updated dark mode status
        return response()->json([
            'dark_mode' => $user->dark_mode,
            'message' => $user->dark_mode ? 'Dark mode enabled.' : 'Dark mode disabled.'
        ]);
    }
}
