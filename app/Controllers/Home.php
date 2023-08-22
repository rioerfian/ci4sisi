<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $users = new UserModel();
        $data = $users->getUsers();
        return view('index', compact('data'));
    }
}
