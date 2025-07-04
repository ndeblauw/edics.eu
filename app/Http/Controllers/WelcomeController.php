<?php

namespace App\Http\Controllers;

use App\Models\Edic;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $established = Edic::where('status', 'established')->get();
        $preparing = Edic::where('status', 'preparing')->get();

        return view('welcome', compact('established', 'preparing'));
    }
}
