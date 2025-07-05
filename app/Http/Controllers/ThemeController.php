<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function update(Request $request)
    {
        $theme = $request->input('theme');
        session(['theme' => $theme]);
        return response()->json(['success' => true]);
    }
}
