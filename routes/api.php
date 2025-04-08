<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);


    $user = User::where('email', $data['email'])->first();


    if (! $user || ! Hash::check($data['password'], $user->password)) {
        return response()->json(['message' => 'Invalid Credentials.'], 401);
    }


    $token = $user->createToken('default')->plainTextToken;

    return response()->json(['token' => $token]);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
});
