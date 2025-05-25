<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function storeLogin(Request $request) {
        if(empty($request->email) or empty($request->password)) {
            return redirect()->route("login")->with("error", "Morate popuniti sva polja!");
        }

        if(Auth::attempt($request->only("email", "password"))) {
            return redirect()->route("public.home");
        }

        return redirect()->route("login")->with("error", "Nepostojeci podaci za logovanje!");
    }

    public function register() {
        return view("auth.register");
    }

    public function storeRegister(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ]);

        $userRole = Role::where("name", "user")->first();

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "role_id" => $userRole->id,
        ]);

        return redirect()->route("admin.users")->with("success", "Registracija je uspesna!");
    }

    public function notAuth() {
        return view("auth.not-auth");
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
