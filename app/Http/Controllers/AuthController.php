<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use App\Models\UserType;
use Illuminate\Support\Str;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        // Create tenant
        $tenant = Tenant::create([
            'uuid' => Str::uuid(),
            'name' => $request->tenant_name
        ]);

        $userType = UserType::where('uuid', $request->user_type)->first('id');

        // Create user for tenant
        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tenant_id' => $tenant->id,
            'user_type_id' => $userType->id
        ]);

        return response()->json(['success' => true, 'message' => 'User registered successfully!']);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid password'], 401);
        }

        // Generate a token
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'token' => $token]);
    }
}
