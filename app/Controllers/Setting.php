<?php

namespace App\Controllers;

use App\Models\ModelSetting;



use App\Controllers\BaseController;

class Setting extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
    }
    public function index()
    {
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Profile Sekolah',
            'menu'      => 'setting',
            'submenu'   => 'profil',
            'profil' => $this->ModelSetting->Profile(),
        ];

        return view('admin/setting/profile', $data);
    }
    public function user()
    {

        $alphanumeric = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        // $arr = array();
        $lenght = strlen($alphanumeric) - 2;
        for ($i = 0; $i < 5; $i++) {
            $x = rand(0, $lenght);
            $arr[] = $alphanumeric[$x];
        }
        $data = [
            'title'     => 'SIAKADINKA',
            'subtitle'  => 'Profile Sekolah',
            'menu'      => 'setting',
            'submenu'   => 'user',
            'user' => $this->ModelSetting->user(),
            'randompass' => $arr
        ];

        return view('admin/setting/user', $data);
    }
}
