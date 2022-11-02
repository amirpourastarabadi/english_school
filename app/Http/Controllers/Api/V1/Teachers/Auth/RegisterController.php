<?php

namespace App\Http\Controllers\Api\V1\Teachers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Register;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Register $request)
    {
        $teacher = Teacher::create($request->validated());
        $token = $teacher->createToken('api_token')->plainTextToken;

        return response()->json([
            'api_token' => $token
        ]);
    }
}
