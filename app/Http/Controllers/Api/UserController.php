<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getAllUsers();
        return response()->json([
            'data' => UserResource::collection($user),
            'message' => 'Fetch all user',
            'success' => true
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $user = $this->userService->createUsers($request);
        return response()->json([
            'data' => new UserResource($user),
            'message' => 'User created successfully.',
            'success' => true
        ]);

    }

    public function show(User $user)
    {
        return response()->json([
            'data' => new UserResource($user),
            'message' => 'Data user found',
            'success' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $user = User::findOrFail($id);
        $user->update([  
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
        return response()->json([
            'data' => new UserResource($user),
            'message' => 'User created successfully.',
            'success' => true
        ]);

    }

    public function destroy($id)
    {
        $this->userService->deleteUsers($id);
        return response()->json([
            'data' => [],
            'message' => 'User deleted successfully',
            'success' => true
        ]);
    }

    public function massCreate(Request $request)
    {
        $request->validate([
            '*.name' => 'required',
            '*.email' => 'required|email',
            '*.password' => 'required|min:8',
        ]);

        $usersData = $request->all();
        $createdUsers = [];

        foreach ($usersData as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);
            
            $createdUsers[] = $user;
        }

        return response()->json([
            'message' => 'Users created successfully',
            'users' => $createdUsers
        ], 201);
    }
}
