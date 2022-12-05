<?php

namespace App\Http\Controllers\Api\V1\Teachers\Auth;

use App\Enums\SanctumTokensEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Auth\Register;
use App\Models\Teacher;

class RegisterController extends Controller
{
    public function __invoke(Register $request)
    {
        $teacher = Teacher::create($request->validated());
        $token = $teacher->createToken(SanctumTokensEnum::AUTH_TOKEN, ['teachers'])->plainTextToken;

        return response()->json([
            'api_token' => $token
        ]);
    }
}
