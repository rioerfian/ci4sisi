<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{



    //LOGIN CONTROLLER
    public function login()
    {
        return view('pages/login');
    }


    public function login_process()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('USERNAME', $username)->first();
        if ($data) {
            $pass = $data['PASSWORD'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'ID_USER'       => $data['ID_USER'],
                    'USERNAME'     => $data['USERNAME'],
                    'EMAIL'     => $data['EMAIL'],
                    'STATUS_USER' => $data['STATUS_USER'],
                    'NAMA_USER' => $data['NAMA_USER'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/dashboard'));
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }

    //---------------------------------------------
    //REGISTER

    public function register(): string
    {
        //include helper form
        helper(['form']);
        return view('pages/register');
    }
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
            'no_hp'         => 'required|max_length[30]|min_length[8]|numeric',
            'whatsapp'      => 'required|max_length[30]|min_length[8]|numeric',
            'pin'           => 'required|max_length[6]|min_length[6]|numeric',
            'username'      => 'required|max_length[60]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $default_status = 'user';
            $data = [
                'NAMA_USER' => $this->request->getVar('name'),
                'USERNAME' => $this->request->getVar('username'),
                'EMAIL' => $this->request->getVar('email'),
                'PASSWORD' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'NO_HP' => $this->request->getVar('no_hp'),
                'WA' => $this->request->getVar('whatsapp'),
                'PIN' => $this->request->getVar('pin'),
                'STATUS_USER' => $default_status

            ];
            $model->save($data);
            return redirect()->to(base_url('/login'));
        } else {
            $data['validation'] = $this->validator;
            return view('pages/register', $data);
        }
    }

    public function profile()
    {
        $session = session();
        $username = $session->get('USERNAME');
        $model = new UserModel();
        $data = $model->where('USERNAME', $username)->first();
        return view('pages/profile', $data);
    }

    public function update()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
            'no_hp'         => 'required|max_length[30]|min_length[8]|numeric',
            'whatsapp'      => 'required|max_length[30]|min_length[8]|numeric',
            'pin'           => 'required|max_length[6]|min_length[6]|numeric',
            'username'      => 'required|max_length[60]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'NAMA_USER' => $this->request->getVar('name'),
                'USERNAME' => $this->request->getVar('username'),
                'EMAIL' => $this->request->getVar('email'),
                'PASSWORD' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'NO_HP' => $this->request->getVar('no_hp'),
                'WA' => $this->request->getVar('whatsapp'),
                'PIN' => $this->request->getVar('pin')

            ];
            $session = session();
            $id = $session->get('ID_USER');
            $model->update($id, $data);
            $data = $model->where('ID_USER', $id)->first();
            $ses_data = [
                'ID_USER'       => $data['ID_USER'],
                'STATUS_USER'       => $data['STATUS_USER']
            ];
            $session->set($ses_data);
            return redirect()->to(base_url('/dashboard'));
        } else {
            $data['validation'] = $this->validator;
            return view('pages/profile', $data);
        }
    }
}
