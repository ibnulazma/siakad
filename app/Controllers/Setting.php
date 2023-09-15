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
}
