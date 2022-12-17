<?php

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getAdminById(int $id): mixed
    {
        return Admin::findOrFail($id);
    }

    /**
     * @param array $details
     * @return mixed
     */
    public function createAdmin(array $details): mixed
    {
        return Admin::create($details);
    }

    public function getAdminByLoginPassword(string $email, string $password): bool|Admin
    {
        $admin = Admin::where('email', $email)->get()[0] ?? false;

        if (!$admin) {
            return false;
        }

        if (Hash::check($password, $admin->password)) {
            return $admin;
        }

        return false;
    }
}
