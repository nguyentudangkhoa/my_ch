<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Actions\Admin\Auth\Auth;
use App\Actions\Admin\Auth\Logout;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Auth\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Show login template
     *
     * @return Application|Factory|View
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Login function
     *
     * @param LoginRequest $request
     * @param Auth $auth
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request, Auth $auth): RedirectResponse
    {
        if ($auth($request->validated())) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.auth.login');
    }



    /**
     * Logout function
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('admin.auth.login');
    }
}
