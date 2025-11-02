<?php

namespace App\Http\ApiRequests\Auth;

use App\ApiResponse\Request\ApiRequestForm;
class RegisterRequest extends ApiRequestForm
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => ['required' , 'string' ,  'email' , 'unique:users,email'] ,
            'first_name' => ['required' , 'string' , 'max:50'] , 
            'last_name' => ['required' , 'string' , 'max:70'] , 
            "password" => ['required' , 'string' , 'confirmed']
        ];
    }
}
