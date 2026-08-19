<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('jabatan')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(StoreUserRequest $request, UserService $userService)
    {
        $validated = $request->validated();
        // Auto-assign role Member (id=2) untuk user baru yang register
        $validated['id_jabatan'] = 2;
        $userService->createUser($validated);
        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $jabatans = Jabatan::all();
        return view('users.form', compact('user', 'jabatans'));
    }

    public function update(UpdateUserRequest $request, $id, UserService $userService)
    {
        $validated = $request->validated();
        $user = User::findOrFail($id);
        $userService->updateUser($user, $validated);
        return redirect('/users')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id, UserService $userService)
    {
        $loggedInUserId = session('user')->id;
        $user = User::findOrFail($id);

        $berhasil = $userService->destroyUser($user, $loggedInUserId);

        if ($berhasil == false) {
            return redirect('/users')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }
        return redirect('/users')->with('success', 'User berhasil dihapus!');
    }
}