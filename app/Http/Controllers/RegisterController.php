<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request.
     *
     * @param RegisterRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
