<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\api\v1\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Mail\SimpleMail;
use Illuminate\Support\Facades\Mail;

use App\Exceptions\api\v1\GlobalException;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\SigninRequest;
use App\Traits\api\v1\HttpResponse;

class EmployeeController extends Controller
{
    use HttpResponse;

    public function signinEmployee(SigninRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            if (!Auth::attempt($validatedData)) {
                throw new GlobalException("Credentials are not valid !", 401);
            }

            $username = $validatedData['username'];

            $connectEmployee = Employee::where('username', $username)->first();
            $connectEmployee->tokens()->delete();
            return $this->success([
                'connectEmployee' => $connectEmployee,
                'token' => $connectEmployee->createToken($username)->plainTextToken
            ], "Sign in successfully !");
        }
    }

    public function createNewEmployee(EmployeeRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $result = Employee::create([
                'fullName' => $validatedData['fullName'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'phoneNumber' => $validatedData['phoneNumber'],
                'password' => Hash::make($validatedData['password']),
                'email_verified' => false,
            ]);

            return $this->success(null, "Create new employee successfully !", 201);
        }

        // Mail::to($employee['email'])->send(new SimpleMail($result));
    }

    public function getAllEmployees()
    {
        return Employee::all();
    }
}
