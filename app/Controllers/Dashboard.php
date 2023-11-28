<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        echo view('section/header', $data);
        echo view('section/sidebar');
        echo view('dashboard_view');
        echo view('section/footer');
    }
}
