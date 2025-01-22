<?php

namespace App\Http\Controllers;

use App\Models\Bakery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome', [
            'bakeries' => Bakery::with('images')->get()
        ]);
    }
} 