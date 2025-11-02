<?php

namespace App\Http\Controllers;

use App\ApiResponse\Facades\ApiResponseFacades;
use App\Http\ApiRequests\Auth\LoginRequest;
use App\Http\ApiRequests\Auth\RegisterRequest;
use App\Http\ApiRequests\Auth\ResetPasswordRequest;
use App\Http\Resources\Auth\AuthenticationResource;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = $this->createUser($request->toArray());
        $token = $this->getToken($user);
        $user->setAttribute('token', "Bearer " . $token);
        return ApiResponseFacades::message('user registering was successful')
            ->data(new AuthenticationResource($user))
            ->status(201)
            ->build();
    }
    public function login(LoginRequest $request)
    {
        $user = $this->checkUserExists($request->email);
        if (!$user && !Hash::check($request->password, $user->password)) {
            return ApiResponseFacades::message('user not found or password is not correct')->status(404)->build();
        }
        $token = $this->getToken($user);
        $user->setAttribute('token', "Bearer " . $token);
        return ApiResponseFacades::message('welcome to dashboard')
            ->data(new AuthenticationResource($user))
            ->status(201)
            ->build();

    }
    public function resetpassword(ResetPasswordRequest $request)
    {
        $user = $this->checkUserExists($request->email);
        if (!$user) {
            return ApiResponseFacades::message('user not found')->status(404)->build();
        }
        $updatePassword = $this->resetpassword($request->password);
        if ($updatePassword) return ApiResponseFacades::message('user password updated successfuly')->status(200)->build();
    }
    // private functions 
    private function createUser(array $data)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                "avatar" => 'avatars/default.jpg'
            ]);
            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            // \Log::error('error in registering user' , $th->getMessage());
            throw new Exception('an error occurred in user registering' , 400);
        }
    }
    private function getToken(User $user)
    {
        $token = $user->createToken('auth-token')->plainTextToken;
        return $token;
    }
    private function checkUserExists(string $email)
    {
        $checkUserExists = User::whereEmail($email)->firstOrFail();
        return $checkUserExists;
    }
    private function reestpassword(User $user, string $password)
    {
        $updateUserPassword = $user->update([
            'password' => hash::make($password)
        ]);
        return $updateUserPassword;
    }
}
