<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class JwtService{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($data){
        $token = $this->userRepository->login($data);
        return $token;
    }

    public function logout(){
        $this->userRepository->logout();
        return;

    }

    public function refresh(){
        $token = $this->userRepository->refresh();
        return $token;
    }

    public function data(){
        $data = $this->userRepository->data();
        return $data;
    }
}