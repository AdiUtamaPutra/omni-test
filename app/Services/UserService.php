<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUsers()
    {
        return User::latest()->get();
    }

    public function createUsers($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    public function updateUsers($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([  
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
    }

    public function deleteUsers($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

}
