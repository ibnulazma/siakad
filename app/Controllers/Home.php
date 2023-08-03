<?php

namespace App\Controllers;

// use App\Models\ModelPpdb;
// use App\Models\ModelSiswa;


class Home extends BaseController
{

    // public function __construct()
    // {

    //     helper('form');
    //     $this->ModelPpdb = new ModelPpdb();
    //     $this->ModelSiswa = new ModelSiswa();
    // }
    public function index()
    {

        session();
        $data = [
            'title' => 'SIAKADINKA',
            'subtitle' => 'Home',

        ];
        return view('v_home', $data);
    }
}
