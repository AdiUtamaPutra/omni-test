<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

class UserManageController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create'); 
    }
    public function store(Request $request)
    {
        $this->validate($request, [  
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',  
        ]); 

        $createUser = $this->userService->createUsers($request);

        return redirect()->route('user-das.index')  
            ->with('success', 'Created successfully.');  
    }

    public function destroy($id)
    {
        $this->userService->deleteUsers($id);

        return redirect()->route('user-das.index')  
            ->with('success', 'Deleted successfully.'); 
    }
}
