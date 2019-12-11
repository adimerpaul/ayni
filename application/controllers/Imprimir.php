<?php
require_once('tcpdf.php');
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorJPG.php');
class Imprimir extends CI_Controller{
    function index(){
        if (!isset($_SESSION['profesion'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('imprimir');
        $this->load->view('templates/footer');
    }
    function libros(){
        if (!isset($_SESSION['profesion'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('imprimir2');
        $this->load->view('templates/footer');
    }
    function librosprint(){

            $colegio=$_POST['colegio'];
            $area=$_POST['area'];

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
        $pdf->AddPage('P','Legal');
            $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

            $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio' AND  area='$area'");
            $con=0;
            $y=10;
        $bo="4";
        foreach ($query->result() as $row){
                $titulo = $row->titulo;
                $area=$row->tematica;
                $codarea=$row->codarea;
                $idioma=$row->idioma;
                $codigo=$row->codigo;
                $colegio=$row->colegio;
                $subcodigo=explode('.',$codigo);
                file_put_contents('img/qr/'.$row->codigo.'.jpg', $generatorSVG->getBarcode($row->codigo, $generatorSVG::TYPE_CODE_39));

                $html='<table border="0" style="border-top: 1px solid #E7E7E7; ;;width: 240px;font-family: Arial;font-size: 8px ">
            <tr >
                <td width="50" align="center">
                   <img src="img/'.$codarea.'.png" width="32"><br>
                   '.$subcodigo[0].'.'.$subcodigo[1].'.<br>
                   '.$subcodigo[2].'
                </td>
                <td width="190" align="right">
                    <small style="font-family: Arial;font-size: 8px;border: 1 px solid black"><br>'.$titulo.substr(0,45).'<br></small>
                    '.$area.' <br>
                    '.$idioma.' *'.$codigo.'*<br>
                    <img src="img/qr/'.$row->codigo.'.jpg" width="120" height="22px" alt="">
                    
                </td>  
            </tr>
            </table>';
                if ($con==20){
                    $con=0;
                    $pdf->AddPage('P','Legal');
                    $y=10;
                }
                if ($con%2==0){
                    $pdf->SetXY(15, $y);
                    $bo="left";
                }else{
                    $pdf->SetXY(120, $y);
                    $y=$y+25;
                    $bo="right";
                }
                $pdf->writeHTML($html,0,0);
                $con++;

        }
            $pdf->Output('example_006.pdf', 'I');
            exit;


    }
    public function contrapordata()
    {
        $colegio=$_POST['colegio'];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $row=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio' ")->row();
        $telefono=$row->telefono;
        $con=0;
        $y=10;
        for ($i=0;$i<10;$i++){
                $html='<br><table border="0" style="width: 240px;font-family: Arial;font-size: 9px ">
            <tr>
                <td style="text-align: center" ><br><br>UNIDAD EDUCATIVA <br>"'.$colegio.'"<br>TELEFONO:'.$telefono.'<br>ORURO-BOLIVIA <br> <br></td>               
            </tr>
            <tr>
                <td ><p style="font-size: 9px;color: #0a6aa1"><small style="text-align: center;font-size: 9px;font-weight: bold;">www.redayni.org </small></p></td>  
            </tr>
            </table>';

            if ($con==10){
                $con=0;
                $pdf->AddPage();
                $y=10;
            }
            if ($con%2==0){
                $pdf->SetXY(20, $y);
            }else{
                $pdf->SetXY(105, $y);
                $y=$y+55;
            }


                $pdf->writeHTML($html,0,0);
                $con++;

        }
        $pdf->Output('example_006.pdf', 'I');
        exit;
    }

    function consulta(){
        $colegio=$_POST['colegio'];
        $categoria=$_POST['categoria'];
        $nivel=$_POST['nivel'];
        $paralelo=$_POST['paralelo'];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage('P', array(216,356));
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

        $query=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio' AND categoria='$categoria' AND nivel='$nivel' AND paralelo='$paralelo'");
        $con=0;
        $y=10;
        foreach ($query->result() as $row){
            $nombre = $row->nombre;
            $nivel=$row->nivel;
            $categoria=$row->categoria;
            $paralelo=$row->paralelo;
            $colegio=$row->colegio;
            $id=$row->id;
            $carpeta=$row->carpeta;
            file_put_contents('img/qr/'.$row->id.'.jpg', $generatorSVG->getBarcode($row->id, $generatorSVG::TYPE_CODE_39));
            $html='<table border="0" style="border: 1px solid #E7E7E7;width: 240px;font-family: Arial;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1">BIBLIOTECA ESCOLAR</p></td>
            </tr>
            <tr>
                <td style="width: 36px;text-align:center">            <br><img src="img/'.$colegio.'.png" width="22" alt=""><br><img src="img/ayni.jpg" ></td>
                <td style="width: 131px;font-size: 8px;height: 70px"><small style="font-size:8px;padding: 10px">UNIDAD EDUCATIVA <br>"'.$colegio.'"<br> <br>Con el apoyo de: <br>ONG AYNI BOLIVIA <br><br>'.$categoria.': '.$nivel.' '.$paralelo.'<br></small>
                </td>
                <td style="width: 73px;"><img src="'.base_url().'fotos/'.$id.'.png" width="58" alt=""></td>
            </tr>
            <tr>
                
                <td colspan="3" style="margin: 100px;font-size:10px;height: 15px;text-align: center;font-weight: bold">
                
                '.$nombre.'
                </td>  
            </tr>   
            <tr>
            <td colspan="3" style="text-align: center;height: 0px;"><img src="img/qr/'.$row->id.'.jpg" width="120" height="22px" alt=""></td>
            </tr>
            <tr>
               <td height="16" style="width: 50px;height: 5px"></td>
               <td style="width: 140px;text-align: center;font-size: 8px">*'.$id.'*</td>
               <td style="width: 50px;text-align: right;font-size: 8px">'.date('Y').'</td>
            </tr>
            </table>';

            if ($con==10){
                $con=0;
                $pdf->AddPage('P', array(216,356));
                $y=10;
            }
            if ($con%2==0){
                $pdf->SetXY(25, $y);
            }else{
                $pdf->SetXY(110, $y);
                $y=$y+55;
            }
            $pdf->writeHTML($html,0,0);
            $con++;
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;

    }

    function profesores(){
        $colegio=$_POST['colegio'];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage('P', array(216,356));
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

        $query=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio' ");
        $con=0;
        $y=10;
        foreach ($query->result() as $row){
            $nombre = $row->nombre;
            $colegio=$row->colegio;
            $id=$row->id;
            $categoria=$row->profesion;
            file_put_contents('img/qr/'.$row->id.'.jpg', $generatorSVG->getBarcode($row->id, $generatorSVG::TYPE_CODE_39));
            $html='<table border="0" style="border: 1px solid #E7E7E7;width: 240px;font-family: Arial;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1">BIBLIOTECA ESCOLAR</p></td>
            </tr>
            <tr>
                <td style="width: 36px;text-align:center">            <br><img src="img/'.$colegio.'.png" width="22" alt=""><br><img src="img/ayni.jpg" ></td>
                <td style="width: 131px;font-size: 8px;height: 70px"><small style="font-size:8px;padding: 10px">UNIDAD EDUCATIVA <br>"'.$colegio.'"<br> <br>Con el apoyo de: <br>ONG AYNI BOLIVIA <br><br>'.$categoria.'<br></small>
                </td>
                <td style="width: 73px;"><img src="'.base_url().'fotos/profesores/'.$id.'.png" width="58" alt=""></td>
            </tr>
            <tr>
                
                <td colspan="3" style="margin: 100px;font-size:10px;height: 15px;text-align: center;font-weight: bold">
                
                '.$nombre.'
                </td>  
            </tr>   
            <tr>
            <td colspan="3" style="text-align: center;height: 0px;"><img src="img/qr/'.$row->id.'.jpg" width="120" height="22px" alt=""></td>
            </tr>
            <tr>
               <td height="16" style="width: 50px;height: 5px"></td>
               <td style="width: 140px;text-align: center;font-size: 8px">*'.$id.'*</td>
               <td style="width: 50px;text-align: right;font-size: 8px">'.date('Y').'</td>
            </tr>
            </table>';
            if ($con==10){
                $con=0;
                $pdf->AddPage('P', array(216,356));
                $y=10;
            }
            if ($con%2==0){
                $pdf->SetXY(25, $y);
            }else{
                $pdf->SetXY(110, $y);
                $y=$y+55;
            }
            $pdf->writeHTML($html,0,0);
            $con++;
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;

    }
}
