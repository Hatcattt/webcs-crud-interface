<?php

namespace App\Custom\Abord;

use Illuminate\Support\Facades\Auth;

class Abord
{
    /**
     * Eject the user who have a reader role, to an error 403 page.
     */
    public static function ifReader() {
        if (Auth::user()->role === 'reader') abort(403);
    }
}
