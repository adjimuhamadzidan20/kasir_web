<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Profil extends BaseController
{
    protected $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('profile_view');
        echo view('section/footer');
    }

    public function halGantiPass() {
        $data = [
            'title' => 'Ganti Password',
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('gantipass_view');
        echo view('section/footer');
    }

    public function gantiPass($user) {
        $userAdmin = $user;
        $dataAdmin = $this->loginModel->getAdmin($userAdmin);

        $passLama = $this->request->getPost('pass_lama');
        $passBaru = $this->request->getPost('pass_baru');
        $konfPass = $this->request->getPost('konfir_pass_baru');

        if ($dataAdmin) {
            if ($dataAdmin['password'] != md5($passLama)) {
                $alert = 'Password lama tidak sesuai!';
                session()->setFlashData('info', $alert);
                return redirect()->to('/profile/ganti_password');
            } 
            else if ($passBaru != $konfPass) {
                $alert = 'Konfirm password tidak sesuai!';
                session()->setFlashData('info', $alert);
                return redirect()->to('/profile/ganti_password');
            } 
            else {
                $this->loginModel->gantiPass($userAdmin, $konfPass);
                $alert = 'Ganti password berhasil!';
                session()->setFlashData('info', $alert);
                
                return redirect()->to('/profile');
            }
        }
    }
}
