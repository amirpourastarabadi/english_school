<?php

namespace App\Http\Controllers\Api\V1\Students\Auth;

use App\Enums\SanctumTokensEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Students\Auth\Register;
use App\Models\Student;

class RegisterController extends Controller
{
    public function __invoke(Register $request)
    {
        $student = Student::create($request->validated());
        $token = $student->createToken(SanctumTokensEnum::AUTH_TOKEN, ['students'])->plainTextToken;

        return response()->json([
            'api_token' => $token
        ]);
    }
}
