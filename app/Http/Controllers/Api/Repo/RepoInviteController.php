<?php

namespace App\Http\Controllers\Api\Repo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepoInviteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->tokenCan('repo:invites_view')) {
            return response(null, 401);
        }
    }

    public function store(Request $request)
    {
        if ($request->user()->tokenCan('repo:invites_create')) {
            return response(null, 401);
        }
    }
}
