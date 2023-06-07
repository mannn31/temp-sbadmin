<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\DataTables\AdminDataTable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\DataTables\AllUserDataTable;
use App\DataTables\VisitorDataTable;

class UserController extends Controller
{
    public function allUser(AllUserDataTable $allUser)
    {
        return $allUser->render('admin.pages.users.all.index', [
            'roles' => Role::get(),
        ]);
    }

    public function storeAllUser()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                    'role' => 'required',
                ]);

                if (request('role') == 1) {
                    $is_admin = 0;
                } elseif (request('role') == 2) {
                    $is_admin = 0;
                } else {
                    $is_admin = 1;
                }

                // Buat User terlebih dahulu lalu ...
                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'username' => request('username'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => $is_admin,
                ])->assignRole(request('role'));
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'User data added successfully',
        ]);
    }

    public function showAllUser($allUserId)
    {
        $data = User::findOrFail($allUserId);

        return view('admin.pages.users.all.detail', [
            'data' => $data,
        ]);
    }

    public function editAllUser($allUserId)
    {
        $data = User::with('roles')->findOrFail($allUserId);

        return response()->json($data);
    }
    public function updateAllUser()
    {
        $data_id = request('data_id');

        try {
            DB::transaction(function () use ($data_id) {

                $validated = [
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required|email',
                    'foto' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                    'role' => 'required',
                ];

                if (request('role') == 1) {
                    $is_admin = 0;
                } elseif (request('role') == 2) {
                    $is_admin = 0;
                } else {
                    $is_admin = 1;
                }

                if ($foto = request('foto')) {
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('assets/img/pp'), $filename);
                }

                $user = User::findOrFail($data_id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                $user->is_admin = $is_admin;
                $user->foto = $filename;
                (request('role')) ? $user->syncRoles(request('role')) : 'Means not user';
                $user->save();

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'User data updated successfully',
        ]);
    }

    public function destroyAllUser($allUserId)
    {
        try {
            $data = User::findOrFail($allUserId);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'User data deleted successfully',
        ]);
    }

    public function userAdmin(AdminDataTable $admin)
    {
        return $admin->render('admin.pages.users.admin.index', [
            'roles' => Role::get(),
        ]);
    }

    public function storeUserAdmin()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                    'role' => 'required',
                ]);

                // Buat User terlebih dahulu lalu ...
                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'username' => request('username'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 0,
                ])->assignRole(request('role'));
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Admin data added successfully',
        ]);
    }

    public function userVisitor(VisitorDataTable $visitor)
    {
        return $visitor->render('admin.pages.users.visitor.index');
    }

    public function storeUserVisitor()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                ]);

                // Buat User terlebih dahulu lalu ...
                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'username' => request('username'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 1,
                ])->assignRole('visitor');
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Visitor data added successfully',
        ]);
    }
}