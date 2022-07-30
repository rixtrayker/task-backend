<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\ApiResponder;

class UserController extends Controller
{
    public function index(Request $request) {
        $offset = $request->page > 0 ? Str::of(10 * ($request->page - 1)) : 0;
        $users = DB::select("SELECT id,first_name,last_name,email,avatar,created_at,updated_at FROM users
        LIMIT ".$offset.",10;
        ");
        $usersResource = UserResource::collection($users);
        return ApiResponder::successResponse($usersResource);
    }

    public function search(Request $request) {
        $query = Str::lower($request->q);
        $offset = $request->page > 0 ? Str::of(10 * ($request->page - 1)) : 0;
        $users = DB::select("SELECT id,first_name,last_name,email,avatar,created_at,updated_at FROM users WHERE LOWER( users.email ) LIKE '%".$query."%'
        OR LOWER( users.first_name ) LIKE '%".$query."%'
        OR LOWER( users.last_name ) LIKE '%".$query."%'
        LIMIT ".$offset.",10 ");
        $usersResource = UserResource::collection($users);
        return ApiResponder::successResponse($usersResource);
    }
}
