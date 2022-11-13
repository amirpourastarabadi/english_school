<?php

namespace App\Http\Controllers\Api\V1\Teachers\Auth;

use App\Enums\SanctumTokensEnum;
use App\Http\Requests\Api\V1\Teachers\Auth\Login;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Login $request)
    {
        $teacher = Teacher::where('mobile', $request->mobile)->first();

        if (is_null($teacher) || !Hash::check($request->get('password'), $teacher->password)) {

            return response()->json(['message' => trans('messages.invalid_credentials.')], Response::HTTP_UNAUTHORIZED);
        }

        $teacher->deleteSanctumTokens(SanctumTokensEnum::AUTH_TOKEN);
        $api_token = $teacher->createToken(SanctumTokensEnum::AUTH_TOKEN, ['teachers'])->plainTextToken;
        return response()->json(['api_token' => $api_token]);
    }
}
