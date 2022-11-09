<?php

namespace App\Http\Controllers\Api\V1\Students\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Students\Login;
use App\Models\Student;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Login $request)
    {
        $student = Student::where('mobile', $request->mobile)->first();

        if (is_null($student) || !Hash::check($request->get('password'), $student->password)) {

            return response()->json(['message' => trans('messages.invalid_credentials.')], Response::HTTP_UNAUTHORIZED);
        }

        $api_token = $student->createToken('api_token', ['students'])->plainTextToken;
        return response()->json(['api_token' => $api_token]);
    }
}
