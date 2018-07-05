<?php

namespace CodeShopping\Http\Controllers\Api;
use CodeShopping\Models\User;
use CodeShopping\Http\Resources\UserResource;
use CodeShopping\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use CodeShopping\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate();
        return UserResource::collection($users);
    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function store(UserRequest $request){
        $user = User::create($request->all());
        return new UserResource($user);
    }

    public function update(UserRequest $request,User $user){
        $user->fill($request->all());
        $user->save();
        return new UserResource($user);
    }

    public function destroy(User $user){
        $user->delete();
        return response()->json([],204);
    }
}
