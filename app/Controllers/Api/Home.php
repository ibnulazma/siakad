<?php

namespace App\Controllers\Api;

use App\Models\Surat;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    use ResponseTrait;

    public function show($id = null)
    {
        $model = new Surat();
        $data = $model->find($id);

        return $this->respond($data);
    }
}
