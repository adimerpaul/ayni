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
    function devolver($id){
        $this->db->query("UPDATE prestamo SET 
fechadevo='".date("Y-m-d H:i:s")."',
estado='DEVUELTO'
WHERE
idprestamo='$id'
");
        header("Location: ".base_url()."Prestamos");
    }
    function datlibro($id=""){
        $query=$this->db->query("SELECT * FROM libro WHERE codigo='$id'");
        echo json_encode( $query->result_array());
    }
    function datestudiante($cod="",$tipo=""){
        if ($tipo=="ESTUDIANTE"){
            $query=$this->db->query("SELECT * FROM estudiante WHERE id='$cod'");
        }else{
            $query=$this->db->query("SELECT * FROM profesor WHERE id='$cod'");
        }
        echo json_encode( $query->result_array());
    }
    function boleta($idprestamos){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();
        $row=$this->db->query("SELECT p.fecha,l.titulo, p.id,p.estado,p.fechadevo,p.tipo,idprestamo,l.autor,l.tematica,p.presta,l.codigo
FROM prestamo p 
INNER JOIN libro l ON p.idlibro=l.idlibro
WHERE idprestamo='$idprestamos'")->row();
        if ($row->tipo=='ESTUDIANTE'){
            $row2=$this->db->query("SELECT * FROM estudiante WHERE idestudiante='$row->id'")->row();
            $nombre=$row2->nombre;
            $id=$row2->id;
            $tipo="ESTUDIANTE[X]     PROFESOR[  ]";
        }else{
            $row2=$this->db->query("SELECT * FROM profesor WHERE idprofesor='$row->id'")->row();
            $nombre=$row2->nombre;
            $id=$row2->id;
            $tipo="ESTUDIANTE[  ]     PROFESOR[X]";
        }
        if ($row->presta=='SALA'){
            $pre="PRESTAMO A DOMICILIO(2 DIAS)[  ]        CONSULTA EN SALA[X]";
        }else{
            $pre="PRESTAMO A DOMICILIO(2 DIAS)[X]        CONSULTA EN SALA[  ]";
        }

        $pdf->SetFont('times','B',15,'',false);
        $pdf->Image('img/ayni.jpg',65,2,9);
        $pdf->Text(10,2,"BIBLIOTECA ESCOLAR",false,false,true,0,1,'C');
        $pdf->SetFont('times','B',12,'',false);
        $pdf->Text(10,10,"BOLETA DE PRESTAMO",false,false,true,0,0,'L');
        $pdf->Text(80,10,"FECHA: ".date('Y-m-d'),false,false,true,0,0,'R');
        $pdf->Rect(10,15,190,16);
        $pdf->SetFont('times','',10,'',false);
        $pdf->Text(12,16,"NOMBRE:    ".$nombre,false,false,true,0,0,'L');
        $pdf->Text(12,21,"CODIGO:     ".$id,false,false,true,0,0,'L');
        $pdf->Text(12,26,"TIPO:            ".$tipo,false,false,true,0,0,'L');
        $pdf->Rect(10,33,190,21);
        $pdf->Text(12,34,"TITULO:                  ".$row->titulo."     CODIGO: ".$row->codigo,false,false,true,0,0,'L');
        $pdf->Text(12,39,"AUTORES:              ".$row->autor,false,false,true,0,0,'L');
        $pdf->Text(12,44,"CLASIFICACIÒN:  ".$row->tematica,false,false,true,0,0,'L');
        $pdf->Text(12,49,$pre,false,false,true,0,0,'C');
        $pdf->Text(11,54,"NUMERO DE ADJUDICION:  ".$idprestamos,false,false,true,0,0,'L');
        $pdf->Output('example_006.pdf', 'I');
        exit;
    }
    function insert(){
        $tipo=trim($_POST['tipo']);
        $codigo=trim($_POST['codigo']);
        $libro= trim( $_POST['libro']);
        $presta= trim( $_POST['presta']);

        $colegio=$_SESSION['colegio'];
        $nombre=$_SESSION['nombre'];

        $row=$this->db->query("SELECT * FROM libro WHERE codigo='$libro'")->row();
        $idlibro=$row->idlibro;
        $titulo=$row->titulo;

        if ($tipo=="ESTUDIANTE"){
            $row=$this->db->query("SELECT * FROM estudiante WHERE id='$codigo'")->row();
            $id=$row->idestudiante;
            $persona=$row->nombre;
        }else{
            $row=$this->db->query("SELECT * FROM profesor WHERE id='$codigo'")->row();
            $id=$row->idprofesor;
            $persona=$row->nombre;
        }
       $this->db->query("INSERT INTO prestamo SET 
idlibro='$idlibro',
id='$id',
tipo='$tipo',
colegio='$colegio',
usuario='$nombre',
presta='$presta',
titulo='$tipo',
persona='$persona'
");
        header("Location: ".base_url()."Prestamos");

    }
}