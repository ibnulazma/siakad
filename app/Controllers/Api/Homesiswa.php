<?php

namespace App\Controllers\Api;

use App\Models\Siswa;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Homesiswa extends ResourceController
{
    use ResponseTrait;

    public function show($id = null)
    {
        $model = new Siswa();
        $data = $model->find($id);

        return $this->respond($data);
    }
}
