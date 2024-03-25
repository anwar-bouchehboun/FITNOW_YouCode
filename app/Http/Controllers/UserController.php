<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function destroy(User $user)
    {

        $user = User::findOrFail($user->id);
        // dd($user);
        // die();
        $user->delete();

        return response()->json(['message' => 'User and associated progressions deleted successfully'], 200);
    }
}