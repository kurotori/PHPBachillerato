<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */

     public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $user = $request->user();//Auth::user();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json(['message' => 'Login successful', 'token' => $token, 'user'=>$user]);
    }

    public function destroy(Request $request){
        var_dump($request->user());

        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return response()->json(['message' => 'Logout successful']);
    }




    public function store2(Request $request): JsonResponse
    {
        //$request->authenticate();

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Login successful']);//->noContent();
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy2(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
