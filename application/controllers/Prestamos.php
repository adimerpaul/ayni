<?php
require_once('tcpdf.php');
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorJPG.php');
class Prestamos extends CI_Controller{
    function index()
    {
        if (!isset($_SESSION['profesion'])) {
            header('Location: ' . base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('prestamos');
        $this->load->view('templates/footer');
    }
    function datlibro($id=""){
        $query=$this->db->query("SELECT * FROM libro WHERE codigo='$id'");
        echo json_encode( $query->result_array());
    }
    function boleta($id){
        $colegio="GUIDO VILLAGOMEZ";
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $row=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio' ")->row();
        $telefono=$row->telefono;
        $con=0;
        $y=10;

        for ($i=0;$i<10;$i++){
            $html='<table border="0" style="width: 240px;font-family: Times;font-size: 9px ">
            <tr>
                <td colspan="3" ><p style="text-align: center;font-size: 16px;font-weight: bold;color: #0a6aa1"><br>&nbsp;</p></td>
            </tr>
            <tr>
                <td style="width: 50px;"></td>
                <td style="width: 140px;text-align: center" >UNIDAD EDUCATIVA <br>"'.$colegio.'"<br><br>Telefono: <br>'.$telefono.'</td>
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
            if ($con%2==0){
                $pdf->SetXY(20, $y);
            }else{
                $pdf->SetXY(115, $y);
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
}