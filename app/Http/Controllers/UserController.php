<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $orders = $user->orders;

        return view('public.profile', compact('user', 'orders'));
    }

    public function users() {
        $users = User::with('role')->get();
        return view('admin.users', [
            "users" => $users,
        ]);
    }

    public function deleteUser($id) {
        return view("admin.deleteuser", [
            "id" => $id,
        ]);
    }

    public function destroyUser($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(url("/admin-users"))->with("success", "Uspesno obrisan korisnik!");
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view("admin.edituser", [
            "user" => $user,
        ]);
    }

    public function updateUser(Request $request, $id) {
        if(empty($request->name) or empty($request->email)) {
            return redirect()->back()->with("error", "Morate popuniti sva polja!");
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect(url('/admin-users'))->with("success", "Korisnik uspesno izmenjen!");
    }
}
