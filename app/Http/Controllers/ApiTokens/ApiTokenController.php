<?php

namespace App\Http\Controllers\ApiTokens;

use App\ApiAbility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTokenController extends Controller
{
    public function index(Request $request)
    {
        $tokens = $request->user()->tokens;
        $apiAbilities = ApiAbility::get();

        return view('apitokens.index', compact('tokens', 'apiAbilities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'abilities' => 'array|nullable',
            'abilities.*' => 'exists:api_abilities,id',
        ]);


        $token = $request->user()->createToken($request->name);

        return back()->withStatus('Token created: ' . $token->plainTextToken);
    }
}
