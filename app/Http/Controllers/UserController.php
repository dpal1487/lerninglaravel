<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $agents = new User;
        if($request->search)
        {
            $agents = $agents->where("name","LIKE","%". $request->search ."%")
            ->orWhere("email","LIKE","%". $request->search ."%");
        }
        $agents = $agents->paginate(10);
        return view('pages.admin.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('pages.admin.agent.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'shift_time' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        try {


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'shift_time' => $request->shift_time,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['message' => 'Agent and services stored successfully.'], 200);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            // Handle database query errors
            return response()->json([
                'errors' => $e->getMessage(),
                'exception' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.admin.agent.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'shift_time' => 'required'
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->shift_time = $request->shift_time;

            if ($request->filled('password') && !Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json(['message' => 'Agent updated successfully', 'user' => $user]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'exception' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->delete()) {
            return response()->json(['message' => 'Agent deleted successfully.'], 200);
        }
    }
}
