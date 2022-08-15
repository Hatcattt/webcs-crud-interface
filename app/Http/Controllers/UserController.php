<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{

    /**
     * Edit users roles
     *
     * @return Renderable
     */
    public function edit()
    {
        $users = User::all();
        return view('users.edit', compact('users'));
    }
}
