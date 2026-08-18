<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Fungsi ini murni hanya memikirkan logika database
    public function updateUser(User $user, array $validatedData)
    {
        $data = [
            'nama' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'id_jabatan' => $validatedData['id_jabatan']
        ];

        // Logika hashing dipindah ke sini
        if (!empty($validatedData['pass'])) {
            $data['pass'] = Hash::make($validatedData['pass']);
        }

        return $user->update($data);
    }

    public function createUser(array $validatedData)
    {
        $validatedData['pass'] = Hash::make($validatedData['pass']);
        return User::create($validatedData);
    }

    public function destroyUser(User $user, int $loggedInUserId)
    {
        if ($loggedInUserId == $user->id) {
            return false;
        }
        return $user->delete();
    }
}