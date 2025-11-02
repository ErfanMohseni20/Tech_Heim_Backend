<?php

namespace App\Http\ApiRequests\Auth;

use App\ApiResponse\Request\ApiRequestForm;
class LoginRequest extends ApiRequestForm
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "email" => ['required', 'email', 'exists:users,email'],
            "password" => ['required', 'string']

        ];
    }
}
