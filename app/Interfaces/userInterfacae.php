<?php

namespace App\Interfaces;

use App\Http\Requests\userRequest;

interface userInterfacae {
    public function register(userRequest $request);
    public function login();
    public function profile();
    public function logout();
    public function refresh();
}
