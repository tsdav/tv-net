<?php

namespace App\Interfaces;

interface AdminRepositoryInterface
{
    public function getAdminById(int $id);
    public function createAdmin(array $details);
    public function getAdminByLoginPassword(string $email, string $password);
}
