<?php
include "Db.php";
require "vendor/autoload.php";

$pdf = new TCPDF();
$pdf->AddPage();


$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Restaurant Menu', 0, 1, 'C');


$html = '<br><table border="1" cellpadding="5">
<tr style="background-color:#f2f2f2;">
    <th><b>ID</b></th>
    <th><b>Name</b></th>
    <th><b>Description</b></th>
    <th><b>Price</b></th>
    <th><b>Category</b></th>
</tr>';


$result = $conn->query("SELECT * FROM menu");

while($row = $result->fetch_assoc()) {
    $html .= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['description'].'</td>
        <td>₹'.$row['price'].'</td>
        <td>'.$row['category'].'</td>
    </tr>';
}

$html .= '</table>';


$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Output('menu.pdf', 'D');
?>