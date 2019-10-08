<?php
require_once('tcpdf.php');
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorJPG.php');
class Profesores extends CI_Controller {
    function index(){
        if (!isset($_SESSION['profesion'])){
            header('Location: '.base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('profesores');
        $this->load->view('templates/footer');
    }
    function prefijo($colegio=""){
        $colegio=urldecode($colegio);
        $row=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'")->row();
        if (isset($row->pre)){
            echo $row->pre;
        }
    }
    function baja($id){
        $this->db->query("UPDATE profesor SET 
        estado='INACTIVO'
        WHERE
        idprofesor='$id'
        ");
        header('Location: '.base_url().'Profesores');
    }
    function alta($id){
        $this->db->query("UPDATE profesor SET 
        estado='ACTIVO'
        WHERE
        idprofesor='$id'
        ");
        header('Location: '.base_url().'Profesores');
    }
    function telefono($colegio=""){
        $colegio=urldecode($colegio);
        $row=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'")->row();
        if (isset($row->celular)){
            echo $row->celular;
        }
    }
    function consulta($colegio=""){
        $colegio=urldecode($colegio);
        $query=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'");
        echo $query->num_rows() +5001;
    }
    function insert(){
        $colegio=$_POST['colegio'];
        $nombre=$_POST['nombre'];
        $celular=$_POST['celular'];
        $id=$_POST['id'];
        $telefono=$_POST['telefono'];
        $usuario=$_POST['usuario'];
        $profesion=$_POST['profesion'];
        $pre=$_POST['pre'];

        $mi_archivo = 'foto';
        $config['upload_path'] = "fotos/profesores";
        $config['file_name'] = $id;
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();
        $this->db->query("INSERT INTO profesor SET 
        colegio='$colegio',
        nombre='$nombre',
        celular='$celular',
        id='$id',
        usuario='$usuario',
        pre='$pre',
        profesion='$profesion'
        ");
        header('Location: '.base_url().'Profesores');
    }
    function target($id){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();

        $row=$this->db->query("SELECT * FROM profesor WHERE idprofesor='$id'")->row();
        $con=0;
        $y=10;
        $nombre = $row->nombre;
        $colegio=$row->colegio;
        $id=$row->id;
        $celular=$row->celular;
        $profesion=$row->profesion;
        file_put_contents('img/qr/'.$row->id.'.jpg', $generatorSVG->getBarcode($row->id, $generatorSVG::TYPE_CODE_128));
        $html='<table border="0" style="border: 1px solid grey;width: 240px;font-family: Times;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1">BIBLIOTECA ESCOLAR</p></td>
            </tr>
            <tr>
                <td style="width: 32px;"><img src="img/GUIDO VILLAGOMEZ.jpg" width="30" alt=""><br><br><img src="img/ayni.png" width="30" alt=""></td>
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

        $pdf->SetXY(25, $y);


        $pdf->writeHTML($html,0,0);
        $pdf->AddPage();
        $html='<table border="0" style="width: 240px;font-family: Times;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1"><br>&nbsp;</p></td>
            </tr>
            <tr>
                <td style="width: 50px;"></td>
                <td style="width: 140px;text-align: center" >UNIDAD EDUCATIVA <br>"'.$colegio.'"<br><br>Telefono: <br>'.$celular.'</td>
                <td style="width: 50px;"></td>
            </tr>
            <tr>
                <td colspan="3"><p style="font-size: 9px;color: #0a6aa1"><small style="text-align: center;font-size: 9px;font-weight: bold;">www.redayni.org </small></p></td>  
            </tr>   
            <tr>
            <td colspan="3" style="text-align: center">&nbsp;</td>
            </tr>
            <tr>
               <td style="width: 50px;">&nbsp;</td>
               <td style="width: 140px;text-align: center">&nbsp;</td>
               <td style="width: 50px;text-align: right">&nbsp;</td>
            </tr>
            </table>';
        $pdf->SetXY(110, $y);
        $pdf->writeHTML($html,0,0);


        $pdf->Output('example_006.pdf', 'I');

    }
    function datos($id){
        $query=$this->db->query("SELECT * FROM profesor WHERE idprofesor='$id'");
        echo json_encode( $query->result_array());
    }
    function update(){
        $colegio=$_POST['colegio'];
        $nombre=$_POST['nombre'];
        $celular=$_POST['celular'];
        $id=$_POST['id'];
        $telefono=$_POST['telefono'];
        $usuario=$_POST['usuario'];
        $profesion=$_POST['profesion'];
        $idprofesor=$_POST['idprofesor'];

        $mi_archivo = 'foto';
        $config['upload_path'] = "fotos/profesores";
        $config['file_name'] = $id;
        $config['allowed_types'] = "*";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            if ($this->upload->display_errors()=="<p>You did not select a file to upload.</p>"){
            }else{
                echo $this->upload->display_errors();
                return;
            }

        }

        $data['uploadSuccess'] = $this->upload->data();
        $this->db->query("UPDATE profesor SET 
       colegio='$colegio',
        nombre='$nombre',
        celular='$celular',
        id='$id',
        usuario='$usuario',
        profesion='$profesion'
        WHERE
        idprofesor='$idprofesor'
        ");
        header('Location: '.base_url().'Profesores');
    }
    function kardex(){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $generatorSVG = new Picqer\Barcode\BarcodeGeneratorJPG();
        $con=0;
        $y=1;
        $query=$this->db->query("SELECT * FROM profesor ");
        foreach ($query->result() as $row){
            if (isset($_POST['c'.$row->id])){
                $nombre = $row->nombre;
                $categoria=$row->profesion;
                $colegio=$row->colegio;
                $id=$row->id;
                file_put_contents('img/qr/'.$row->id.'.jpg', $generatorSVG->getBarcode($row->id, $generatorSVG::TYPE_CODE_39));
                $html='<table border="0" style="border: 1px solid #E7E7E7;width: 240px;font-family: Arial;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1">BIBLIOTECA ESCOLAR</p></td>
            </tr>
            <tr>
                <td style="width: 32px;"><img src="img/'.$colegio.'.jpg" width="20" alt=""><br><img src="img/ayni.png" style="width: 500px;" width="1000" alt=""></td>
                <td style="width: 153px;font-size: 8px;height: 70px"><small style="font-size: 7px;padding: 10px">UNIDAD EDUCATIVA <br>"'.$colegio.'"<br> <br>Con el apoyo de: <br>ONG AYNI BOLIVIA <br><br>'.$categoria.'</small>
                </td>
                <td style="width: 55px;"><img src="'.base_url().'fotos/profesores/'.$id.'.png" width="55" alt=""></td>
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
        }
        $pdf->Output('example_006.pdf', 'I');
        exit;
    }
}
