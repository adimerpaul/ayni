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
            $html='<table border="" style="border: 1px solid grey;width: 240px;font-family: Times;font-size: 9px ">
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
    function datoslibro($id){
        header('Content-Type: text/html; charset=utf-8');
        $query=$this->db->query("SELECT * FROM libro WHERE idlibro='$id'");
        echo json_encode( $query->result_array());
    }
    function incremento($colegio=''){
        header('Content-Type: text/html; charset=utf-8');
        $colegio=urldecode($colegio);
        $row=$this->db->query("SELECT incremento FROM libro WHERE colegio='$colegio' ")->row();
        echo $row->incremento;
    }
function codigo(){
    $nivel=$_POST['nivel'];
    $tematica=$_POST['tematica'];
    $incremento=$_POST['incremento'];
    $colegio=$_POST['colegio'];
    $row=$this->db->query("SELECT * FROM libro WHERE tematica='$tematica'")->row();
    $codigosubarea=$row->codsubarea;
    $query=$this->db->query("SELECT * FROM libro WHERE nivelno='$nivel' AND codsubarea='$codigosubarea' AND colegio='$colegio'");
    $cantidad=$query->num_rows()+1;
    $cantidad=$cantidad+$incremento;
    echo $nivel.'.'.$codigosubarea.'.'.str_pad($cantidad, 4, '0', STR_PAD_LEFT);;
}
function insert(){
    $area=$_POST['area'];
    $tematica=$_POST['tematica'];
    $codarea=$this->db->query("SELECT * FROM libro WHERE area='$area'")->row()->codarea;
    $codsubarea=$this->db->query("SELECT * FROM libro WHERE tematica='$tematica'")->row()->codsubarea;
    $nivel=array('0','Primero','Segundo','Tercero','Cuarto','Quinto','Sexto');
    $this->db->insert('libro',array(
        'colegio'=>$_POST['colegio'],
        'nroserie'=>$_POST['nroserie'],
        'nroalcaldia'=>$_POST['nroalcaldia'],
        'autor'=>$_POST['autor'],
        'titulo'=>$_POST['titulo'],
        'original'=>$_POST['original'],
        'anioedicion'=>$_POST['anioedicion'],
        'editorial'=>$_POST['editorial'],
        'procedencia'=>$_POST['procedencia'],
        'estado'=>$_POST['estado'],
        'idioma'=>$_POST['idioma'],
        'nivelno'=>$_POST['nivel'],
        'nivel'=>$nivel[$_POST['nivel']],
        'codarea'=>$codarea,
        'codsubarea'=>$codsubarea,
        'area'=>$_POST['area'],
        'tematica'=>$_POST['tematica'],
        'incremento'=>$_POST['incremento'],
        'codigo'=>$_POST['codigo']

    ));
    header("Location: ".base_url()."Book");
}
function update(){
    $area=$_POST['area'];
    $tematica=$_POST['tematica'];
    $codarea=$this->db->query("SELECT * FROM libro WHERE area='$area'")->row()->codarea;
    $codsubarea=$this->db->query("SELECT * FROM libro WHERE tematica='$tematica'")->row()->codsubarea;
    $nivel=array('0','Primero','Segundo','Tercero','Cuarto','Quinto','Sexto');

    $this->db->where('idlibro', $_POST['idlibro']);
    $this->db->update('libro', array(
        'colegio'=>$_POST['colegio'],
        'nroserie'=>$_POST['nroserie'],
        'nroalcaldia'=>$_POST['nroalcaldia'],
        'autor'=>$_POST['autor'],
        'titulo'=>$_POST['titulo'],
        'original'=>$_POST['original'],
        'anioedicion'=>$_POST['anioedicion'],
        'editorial'=>$_POST['editorial'],
        'procedencia'=>$_POST['procedencia'],
        'estado'=>$_POST['estado'],
        'idioma'=>$_POST['idioma'],
        'nivelno'=>$_POST['nivel'],
        'nivel'=>$nivel[$_POST['nivel']],
        'codarea'=>$codarea,
        'codsubarea'=>$codsubarea,
        'area'=>$_POST['area'],
        'tematica'=>$_POST['tematica'],
        'pre'=>$_POST['pre'],
        'incremento'=>$_POST['incremento'],
        'codigo'=>$_POST['codigo']
    ));
    header("Location: ".base_url()."Book");
}

    function baja($id){
        $this->db->query("UPDATE libro SET 
        estado='Malo'
        WHERE
        idlibro='$id'
        ");
        header('Location: '.base_url().'Book');
    }
    function alta($id){
        $this->db->query("UPDATE libro SET 
        estado='Bueno'
        WHERE
        idlibro='$id'
        ");
        header('Location: '.base_url().'Book');
    }
    function kardex(){
        $orden=$_POST['orden'];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage('P','Legal');
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();
        $con=0;
        $y=4;
        $query=$this->db->query("SELECT * FROM libro ORDER BY $orden");
        $bo="right";
        foreach ($query->result() as $row){
            if (isset($_POST['c'.$row->idlibro])){
                $titulo = $row->titulo;
                $area=$row->tematica;
                $codarea=$row->codarea;
                $idioma=$row->idioma;
                $codigo=$row->codigo;
                $colegio=$row->colegio;
                $subcodigo=explode('.',$codigo);
                file_put_contents('img/qr/'.$row->codigo.'.jpg', $generatorSVG->getBarcode($row->codigo, $generatorSVG::TYPE_CODE_39));

                $html='<table border="0" style="border-top: 1px solid #E7E7E7;border-bottom: 1px solid #E7E7E7;border-'.$bo.': 1px solid #E7E7E7;width: 240px;font-family: Arial;font-size: 8px ">
            <tr>
                <td width="70" align="center">
                   <img src="img/'.$codarea.'.png" width="32"><br>
                   '.$subcodigo[0].'.'.$subcodigo[1].'.<br>
                   '.$subcodigo[2].'
                </td>
                <td width="170" align="right">
                    <small style="font-family: Arial;font-size: 8px;">'.$titulo.'<br><br></small>
                    '.$area.' <br>
                    '.$idioma.' *'.$codigo.'*<br>
                    <img src="img/qr/'.$row->codigo.'.jpg" width="120" height="22px" alt="">
                </td>  
            </tr>
            </table>';
                if ($con==20){
                    $con=0;
                    $pdf->AddPage('P','Legal');
                    $y=2;
                }
                if ($con%2==0){
                    $pdf->SetXY(25, $y);
                    $bo="left";
                }else{
                    $pdf->SetXY(110, $y);
                    $y=$y+22;
                    $bo="right";
                }
                $pdf->writeHTML($html,0,0);
                $con++;
            }
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;
    }

}
