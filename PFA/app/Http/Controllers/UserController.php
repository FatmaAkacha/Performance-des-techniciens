<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser()
    {
        return response()->json(User::all(), 200);
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message"=>"User not found"],404);
        }
        return response()->json(User::find($id), 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function addUser(Request $request)
    {
        $user = User::create($request->all());
        return response($user,201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'location' => 'required|string|in:Tunis,Sousse,Sfax',
            'specific_location' => 'nullable|string|required_if:location,Sfax|in:7 Novembre,Menzel Cheker',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->location = $request->location;
        $user->specific_location = $request->specific_location;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function updateUser(Request $request ,$id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->update($request->all());
        return response($user,200);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'location' => 'required|string|in:Tunis,Sousse,Sfax',
            'specific_location' => 'nullable|string|required_if:location,Sfax|in:7 Novembre,Menzel Cheker',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->location = $request->location;
        $user->specific_location = $request->specific_location;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser(User $user,$id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->delete();
        return response(null,204);
    }
}
