<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{

    public function index()
    {
        $session = session();
        $id_user = $session->get('ID_USER');
        $model = new UserModel();
        $data = $model->where('ID_USER', $id_user)->first();

        return view('pages/dashboard', $data);
    }
}
