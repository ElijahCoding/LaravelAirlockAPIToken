<?php

namespace App\Http\Controllers\ApiTokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function index(Request $request)
    {
        return view('apitokens.index');
    }
}
