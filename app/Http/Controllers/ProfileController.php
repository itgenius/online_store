<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');  // Assure-toi de créer cette vue (resources/views/profile.blade.php)
    }
}
