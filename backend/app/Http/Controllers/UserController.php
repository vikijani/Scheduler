<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return response()->json([
            'message' => 'Saved informatoins successfully.',
        ]);
    }
}
