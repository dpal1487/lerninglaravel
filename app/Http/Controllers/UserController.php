<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $agents = User::all();
        return view('pages.admin.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('pages.admin.agent.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'Agent and services stored successfully.'], 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.admin.agent.edit', compact('user'));
    }
    public function update(Request $request , $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::where('id' , $id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'Agent updatedd successfully.'], 200);
    }
    public function destroy($id)
    {
        $user = User::where('id' , $id)->first();

        if ($user->delete()) {
            return response()->json(['message' => 'Agent deleted successfully.'], 200);
        }
    }
}
