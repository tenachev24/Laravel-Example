<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return int
     */
    public function getCurrentUserId()
    {
        return Auth::user()['admin'];
    }
}
