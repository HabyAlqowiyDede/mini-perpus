<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => [
                'required',
                'confirmed',
                Password::min(8),
            ]
        ]);

        try {
            $response = $this->authService->register($validated);
            if (!$response) {
                return redirect()->back()->with('error', 'Registrasi gagal');
            }

            return redirect()->route('login')->with('success', 'Registrasi berhasil');
        } catch (\Throwable $th) {
            Log::error('Error during registration: ' . $th->getMessage(), [
                'line'      => $th->getLine(),
                'file'      => $th->getFile(),
                'message'   => $th->getMessage()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'     => ['required', 'email', 'exists:users'],
            'password'  => ['required']
        ]);

        try {
            $response = $this->authService->login($validated);

            if (!$response) {
                return redirect()->back()
                    ->with('error', 'Email atau password salah');
            }

            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil');
        } catch (\Throwable $th) {
            Log::error('Error during login: ' . $th->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan');
        }
    }
    public function logout()
    {
        try {
            session()->flush();
            return redirect("/")->with('success', 'Anda telah keluar');
        } catch (\Throwable $th) {
            Log::error([
                'line'      => $th->getLine(),
                'file'      => $th->getFile(),
                'message'   => $th->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
