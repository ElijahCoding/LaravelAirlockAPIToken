<?php

namespace App\Http\Controllers\ApiTokens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function index(Request $request)
    {
        $tokens = $request->user()->tokens;

        return view('apitokens.index', compact('tokens'));
    }

    public function store(Request $request)
    {
        $token = $request->user()->createToken($request->name);

        return back()->withStatus('Token created: ' . $token->plainTextToken);
    }
}
