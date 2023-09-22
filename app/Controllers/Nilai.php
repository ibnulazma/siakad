namespace App\Controllers;

use App\Models\ModelAgama;

class Nilai extends BaseController
{
public function __construct()
{
helper('form');
$this->ModelAgama = new ModelAgama();
}

public function index()
{


$data = [
'title' => 'SIAKADINKA',
'subtitle' => 'Agama',
'agama' => $this->ModelAgama->AllData(),
'isi' => 'admin/v_agama'

];
return view('admin/v_agama', $data);
}
}