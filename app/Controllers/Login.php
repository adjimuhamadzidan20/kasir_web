<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\loginModel;

class Login extends BaseController
{
    protected $loginModel;

    public function __construct() {
        $this->loginModel = new loginModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('login_view', $data);
    }

    public function masuk_admin() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $admin = $this->loginModel->getAdmin($username);

        if ($admin) {
            if ($admin['password'] == md5($password)) {
                $user = [
                    'admin' => $admin['nama_admin'],
                    'user' => $admin['username'],
                ];

                session()->set($user);
                return redirect()->to('/dashboard');            
            } else {
                $alert = 'Username atau password tidak sesuai!';
                session()->setFlashData('pesan', $alert);
                return redirect()->to('/login');
            }
        } else {
            $alert = 'Username atau password tidak sesuai!';
            session()->setFlashData('pesan', $alert);
            return redirect()->to('/login');
        }
    }

    public function keluar_admin() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
