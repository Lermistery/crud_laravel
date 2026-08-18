<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function verifyLogin(array $credentials)
    {
        // Cari usernya di database
        $user = User::with('jabatan')->where('username', $credentials['username'])->first();

        // Cek kecocokan password
        if ($user && Hash::check($credentials['password'], $user->pass)) {
            return $user;
        }

        return false;
    }
}
