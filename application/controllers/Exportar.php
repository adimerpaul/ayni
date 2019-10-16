<?php
class Exportar extends CI_Controller{
function index(){
    if (!isset($_SESSION['profesion'])) {
        header('Location: ' . base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('exportar');
    $this->load->view('templates/footer');
}
function archivo($anio,$mes){
    // file name
    $colegio=$_SESSION['colegio'];
    $filename = 'estudiantes_'.$colegio.'_'.$anio.'_'.$mes.'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");
    // get data
    $usersData = $this->db->query("SELECT colegio,nombre,nivel,id,fecha,categoria,telefono,estado,pre FROM estudiante WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes'")->result_array();
    // file creation
    $file = fopen('php://output', 'w');
    $header = array("colegio","nombre","nivel","id","fecha","categoria","telefono","estado","pre");
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){
        fputcsv($file,$line);
    }
    fclose($file);
    exit;
}
function prestamos($anio,$mes){
    $colegio=$_SESSION['colegio'];
    $filename = 'prestamos_'.$colegio.'_'.$anio.'_'.$mes.'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");
    // get data
    $usersData = $this->db->query("SELECT fecha,idlibro,id,fechadevo,estado,tipo,presta,colegio,usuario FROM prestamo WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes'")->result_array();
//    exit;
    // file creation
    $file = fopen('php://output', 'w');
    $header = array("fecha","idlibro","id","fechadevo","estado","tipo","presta","colegio","usuario");
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){
        fputcsv($file,$line);
    }
    fclose($file);
    exit;
}
}