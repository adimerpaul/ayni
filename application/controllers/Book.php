<?php
header('Content-Type: text/html; charset=utf-8');
require_once('tcpdf.php');
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorJPG.php');

class Book extends CI_Controller{
function index(){
    if (!isset($_SESSION['profesion'])){
        header('Location: '.base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('book');
    $this->load->view('templates/footer');
}
    function librosprint(){

        $colegio=$_POST['colegio'];
        $area=$_POST['area'];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();
        $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio' AND  area='$area'");
        $con=0;
        $y=10;
        foreach ($query->result() as $row){
            $codigo = $row->codigo;
            $tematica = $row->tematica;
            $idioma = $row->idioma;
            file_put_contents('img/qr/'.$row->codigo.'.jpg', $generatorSVG->getBarcode($row->codigo, $generatorSVG::TYPE_CODE_128));
            $html='<table border="0" style="border: 1px solid grey;width: 240px;font-family: Times;font-size: 9px ">
            <tr>
                <td style="width: 65px;text-align: center"><img src="img/'.$area.'.jpg" alt="" width="35" height="35"></td>
                <td style="width:185px;"><p style="text-align: right">'.$tematica.' <br> <br> '.$idioma.' '.$codigo.'</p></td>
            </tr> 
            <tr>
            <td style="text-align: center">'.$row->codigo.'</td>
            <td colspan="2" style="text-align: right"><img src="img/qr/'.$row->codigo.'.jpg" width="120" alt=""></td>
            </tr>
            </table>';

            if ($con==20){
                $con=0;
                $pdf->AddPage();
                $y=10;
            }
            if ($con%2==0){
                $pdf->SetXY(15, $y);
            }else{
                $pdf->SetXY(110, $y);
                $y=$y+19;
            }
            $pdf->writeHTML($html,0,0);
            $con++;
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;


    }
function target($id){
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetFont('times', '', 10);
    $pdf->AddPage();
//$pdf->writeHTML($html, true, false, true, false, '');
    $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();
    file_put_contents('img/a.jpg', $generatorSVG->getBarcode('123456789', $generatorSVG::TYPE_EAN_13));
    $pdf->Image('img/Lectura e interpretacion de imágenes.jpg',20,10,10,10);
    $pdf->Image('img/a.jpg',48,22,47.5,7.5);
    $pdf->Cell(30, 1,'',0);
    $pdf->Cell(60, 1, 'TEST CELL STRETCH: no lorem  asadasd', 0, 0, 'C', 0, '', 0);
    $pdf->Ln(8);
    $pdf->Cell(30, 1,'',        0);
    $pdf->Cell(60, 1, 'español codigo', 0, 0, 'C', 0, '', 0);
    $pdf->Ln(7);
    $pdf->Cell(30, 1,'123456789',0,0,'C');
    $pdf->Output('example_006.pdf', 'I');
}
function datos(){
    header('Content-Type: text/html; charset=utf-8');
    $area=$_POST['area'];
    $query=$this->db->query("SELECT tematica FROM libro WHERE area='$area' GROUP BY tematica");
    echo json_encode( $query->result_array());
}
}
