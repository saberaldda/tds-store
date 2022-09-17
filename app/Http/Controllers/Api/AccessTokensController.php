<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokensController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'device_name' => ['required'],
            'abilities' => ['nullable'],
        ]);

        $user = User::where('email', $request->username)
            // ->orWhere('mobile', $request->username)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return Response::json([
                'message' => 'Invalid username or password',
            ], 401);
        }

        // Convert String To Array (,) The separeter
        $abilities = $request->input('abilities', ['*']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode(',', $abilities);
        }
        $token = $user->createToken($request->device_name, $abilities);

        //$token = $user->createToken($request->device_name, $abilities, $request->ip());

        // $accessToken = $user->tokens()->latest()->first();  // 1

        // $accessToken = PersonalAccessToken::findToken($token->plainTextToken);  // 2
        // $accessToken->forceFill([
        //     'ip' => $request->ip(),
        // ])->save();

        Log::info("User $user->name logged in from" . $request->ip(), [  // register in log without error
            'ip' => $request->ip(),
            'device' => $request->input('device_name'),
        ]);

        return Response::json([
            'message'   => 'Access Token Created',
            'status'    => 201,
            'data'      => [
                'token' => $token->plainTextToken,
                'user' => $user,
            ],
        ],201);
    }

    public function destroy()
    {
        $user = Auth::guard('sanctum')->user();

        // Revoke (delete) all user tokens
        // $user->tokens()->delete();

        // Revoke current access token
        $user->currentAccessToken()->delete();

        return response()->json([
            'message'   => 'Access Token Revoked',
            'status'    => 200,
        ]);
    }
}
