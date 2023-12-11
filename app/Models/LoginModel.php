<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class LoginModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_admin', 'username', 'password'];

    public function getAdmin($user) {
        return $this->where('username', $user)->first();
    }

    public function getPass($pass) {
        $sandi = md5($pass);
        return $this->where('password', $sandi)->first();
    }

    public function gantiPass($user, $pass) {
        $sandi = md5($pass);
        $sql = "UPDATE admin SET password = '$sandi' WHERE username = '$user'";
        return $this->query($sql);
    }
}
