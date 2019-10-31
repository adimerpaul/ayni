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
    function libros($anio,$mes){
        // file name

        $colegio=$_SESSION['colegio'];
        $filename = 'libros_'.$colegio.'_'.$anio.'_'.$mes.'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        // get data

        $usersData = $this->db->query("SELECT 
colegio,
nroserie,
nroalcaldia,
autor,
titulo,
original,
procedencia,
estado,
idioma,
nivelno,
nivel,
codarea,
area,
codsubarea,
tematica,
codigo,
fecha,
incremento
 FROM libro WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes'")->result_array();
        // file creation
        $file = fopen('php://output', 'w');
        $header = array(
            "colegio",
            "nroserie",
            "nroalcaldia",
            "autor",
            "titulo",
            "original",
            "procedencia",
            "estado",
            "idioma",
            "nivelno",
            "nivel",
            "codarea",
            "area",
            "codsubarea",
            "tematica",
            "codigo",
            "fecha",
            "incremento"
        );
        fputcsv($file, $header);
        foreach ($usersData as $key=>$line){
            fputcsv($file,$line);
        }
        fclose($file);
        exit;
    }
    function profesores($anio,$mes){
        // file name

        $colegio=$_SESSION['colegio'];
        $filename = 'profesores_'.$colegio.'_'.$anio.'_'.$mes.'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        // get data

        $usersData = $this->db->query("SELECT 
colegio,
celular,
nombre,
profesion,
id,
fecha,
usuario,
pre
 FROM profesor WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes'")->result_array();
        // file creation
        $file = fopen('php://output', 'w');
        $header = array(
            "colegio",
            "celular",
            "nombre",
            "profesion",
            "id",
            "fecha",
            "usuario",
            "pre"
        );
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
    $usersData = $this->db->query("SELECT fecha,
fechadevo,
estado,
tipo,
presta,
colegio,
usuario,
titulo,
persona,
codigolibro,
codigopersona,
autor tematica,
lote
 FROM prestamo WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes' ORDER BY idprestamo")->result_array();
//    exit;
    // file creation
    $file = fopen('php://output', 'w');
    $header = array(
        "fechadevo",
        "estado",
        "tipo",
        "presta",
        "colegio",
        "usuario",
        "titulo",
        "persona",
        "codigolibro",
        "codigopersona",
        "autor tematica",
        "lote"
    );
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){
        fputcsv($file,$line);
    }
    fclose($file);
    exit;
}
}
