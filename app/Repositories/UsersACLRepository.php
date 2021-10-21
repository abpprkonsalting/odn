<?php

namespace App\Repositories;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;
use Illuminate\Support\Facades\Auth;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        $personalInformationFolder = session("personalInformationFolder");

        return [
            ['disk' => 'public', 'path' => '/', 'access' => 1],
            ['disk' => 'public', 'path' => $personalInformationFolder, 'access' => 2],
            ['disk' => 'public', 'path' => "$personalInformationFolder/*", 'access' => 2],
        ];
    }
}