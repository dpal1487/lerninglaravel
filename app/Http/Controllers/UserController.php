<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('pages.admin.agent.index');
    }

    public function create(){
        return view('pages.admin.agent.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
        ]);

        return response()->json(['message' => 'Agent and services stored successfully.'], 200);
    }
}
