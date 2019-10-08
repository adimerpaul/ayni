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
                $html='<table border="0" style="width: 240px;font-family: Arial;font-size: 9px ">
            <tr>
                <td style="text-align: center" >UNIDAD EDUCATIVA <br>"'.$colegio.'"<br><br> <br>Telefono:'.$telefono.'<br></td>               
            </tr>
            <tr>
                <td ><p style="font-size: 9px;color: #0a6aa1"><small style="text-align: center;font-size: 9px;font-weight: bold;">www.redayni.org </small></p></td>  
            </tr>
            </table>';
                if ($con%2==0){
                    $pdf->SetXY(20, $y);
                }else{
                    $pdf->SetXY(105, $y);
                    $y=$y+51;
                }
                if ($con==10){
                    $con=0;
                    $pdf->AddPage();
                    $y=10;
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
        $pdf->AddPage();
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

        $query=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio' AND categoria='$categoria' AND nivel='$nivel' AND paralelo='$paralelo'");
        $con=0;
        $y=1;
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
                <td style="width: 32px;"><img src="img/'.$colegio.'.jpg" width="20" alt=""><br><img src="img/ayni.png" style="width: 500px;" width="1000" alt=""></td>
                <td style="width: 153px;font-size: 8px;height: 70px"><small style="font-size: 7px;padding: 10px">UNIDAD EDUCATIVA <br>"'.$colegio.'"<br> <br>Con el apoyo de: <br>ONG AYNI BOLIVIA <br><br>'.$categoria.' : '.$nivel.' '.$paralelo.'</small>
                </td>
                <td style="width: 55px;"><img src="'.base_url().'fotos/'.$id.'.png" width="55" alt=""></td>
            </tr>
            <tr>
                <td colspan="3" style="margin: 100px;height: 15px;text-align: center;font-weight: bold">'.$nombre.'</td>  
            </tr>   
            <tr>
            <td colspan="3" style="text-align: center;height: 33px;"><img src="img/qr/'.$row->id.'.jpg" width="120" height="25px" alt=""></td>
            </tr>
            <tr>
               <td style="width: 50px;height: 17px"></td>
               <td style="width: 140px;text-align: center;font-size: 8px">*'.$id.'*</td>
               <td style="width: 50px;text-align: right;font-size: 8px">'.date('Y').'</td>
            </tr>
            </table>';

            if ($con==10){
                $con=0;
                $pdf->AddPage();
                $y=1;
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
        $pdf->AddPage();
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

        $query=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio' ");
        $con=0;
        $y=10;
        foreach ($query->result() as $row){
            $nombre = $row->nombre;
            $colegio=$row->colegio;
            $id=$row->id;
            $profesion=$row->profesion;
            file_put_contents('img/qr/'.$row->id.'.jpg', $generatorSVG->getBarcode($row->id, $generatorSVG::TYPE_CODE_128));
            $html='<table border="0" style="border: 1px solid grey;width: 240px;font-family: Times;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1">BIBLIOTECA ESCOLAR</p></td>
            </tr>
            <tr>
                <td style="width: 32px;"><img src="img/GUIDO VILLAGOMEZ.jpg" width="30" alt=""><br><br><img src="img/ayni.jpg" width="45" alt=""></td>
                <td style="width: 153px;font-size: 8px">UNIDAD EDUCATIVA <br>"'.$colegio.'"<br>Con el apoyo de: <br>ONG AYNI BOLIVIA <br>'.$profesion.'</td>
                <td style="width: 55px;"><img src="'.base_url().'fotos/profesores/'.$id.'.png" width="55" alt=""></td>
            </tr>
            <tr>
                <td colspan="3"><p style="font-size: 9px;"><small style="text-align: center;font-size: 9px;font-weight: bold;">'.$nombre.'</small><br></p></td>  
            </tr>   
            <tr>
            <td colspan="3" style="text-align: center"><img src="img/qr/'.$row->id.'.jpg" width="120" alt=""></td>
            </tr>
            <tr>
               <td style="width: 50px;"></td>
               <td style="width: 140px;text-align: center">*'.$id.'*</td>
               <td style="width: 50px;text-align: right">'.date('Y').'</td>
            </tr>
            </table>';

            if ($con==10){
                $con=0;
                $pdf->AddPage();
                $y=10;
            }
            if ($con%2==0){
                $pdf->SetXY(15, $y);
            }else{
                $pdf->SetXY(110, $y);
                $y=$y+51;
            }
            $pdf->writeHTML($html,0,0);
            $con++;
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;

    }
}