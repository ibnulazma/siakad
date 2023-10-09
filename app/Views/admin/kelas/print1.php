<?php




$html = '
aku



';
//Atur Gambar

$dompdf->loadHtml($html);
$dompdf->setPaper('Legal', 'potrait');
$dompdf->render();
$dompdf->stream('data siswa kelas.pdf', array(
    "Attachment" => false
));
