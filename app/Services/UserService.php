<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($data){
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'unique:users,email|required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $user = $this->userRepository->register($data);
        return $user;
    }
}