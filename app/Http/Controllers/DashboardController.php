<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function notAdmin()
    {
        return view('notadmin.dashboard');
    }

    public function profile($id)
    {
        $user = User::with([
            'roles',
        ])->find($id);

        return view('admin.pages.profile.index', [
            'user' => $user,
        ]);
    }

    public function editProfile($id)
    {
        $user = User::with([
            'roles',
        ])->findOrFail($id);

        return response()->json($user);
    }

    public function updateProfile()
    {
        $userId = request('user_id');

        try {
            DB::transaction(function () use ($userId) {

                $validated = [
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required|email',
                    'foto' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ];

                if ($foto = request('foto')) {
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('assets/img/pp'), $filename);
                }

                $user = User::findOrFail($userId);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                $user->foto = $filename;
                $user->save();

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Profile updated successfully',
        ]);
    }
}