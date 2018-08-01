<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Events\UserCreateEvent;
use CodeShopping\Common\OnlyTrashed;
use CodeShopping\Models\User;
use CodeShopping\Http\Resources\UserResource;
use CodeShopping\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use CodeShopping\Http\Controllers\Controller;

class UserController extends Controller
{

    use OnlyTrashed;

    public function index(Request $request){
        $query = User::query();
        $query = $this->onlyTrashedIfRequested($request,$query);
        $users = $query->paginate(10);
        return UserResource::collection($users);
    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function store(UserRequest $request){
        $user = User::create($request->all());
        event(new UserCreateEvent($user));
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
