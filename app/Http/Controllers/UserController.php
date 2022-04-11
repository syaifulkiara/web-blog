<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $users      = User::all();
        return view('users.index', compact('users'));
    }
}
