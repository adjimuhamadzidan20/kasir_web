<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Lockscreen extends BaseController
{
    protected $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function lock()
    {
       $data = [
            'title' => 'Lockscreen',
        ];

        return view('lock_screen_view', $data);
    }

    public function masuk() {
        $password = $this->request->getPost('password');
        $admin = $this->loginModel->getPass($password);

        if ($admin) {
            if ($admin['password'] == md5($password)) {
                if (session()->get('admin')) {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/lock_screen');
                }           
            }
        } else {
            $alert = 'Password tidak sesuai!';
            session()->setFlashData('pesan', $alert);
            return redirect()->to('/lock_screen');
        }
    }
}
