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

        $query2=$this->db->query("SELECT * FROM prestamo WHERE lote='$id' ORDER BY idprestamo");
        foreach ($query2->result() as $row2){
            $this->db->query("UPDATE prestamo SET 
            fechadevo='".date("Y-m-d H:i:s")."',
            estado='DEVUELTO'
            WHERE
            idprestamo='$row2->idprestamo'
            ");
        }
        header("Location: ".base_url()."Prestamos");
    }
    function datlibro($id=""){
        $colegio=$_SESSION['colegio'];
        $query=$this->db->query("SELECT * FROM libro WHERE codigo='$id' AND colegio='$colegio'");
        echo json_encode( $query->result_array());
    }
    function datestudiante($cod=""){
        $colegio=$_SESSION['colegio'];
        $query=$this->db->query("SELECT * FROM estudiante WHERE id='$cod' AND colegio='$colegio'");
            if ($query->num_rows()>0){
                $ca=$query->result_array();
                $ninodomicilio=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='1'")->row()->dato;
                $ninosala=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='2'")->row()->dato;
                $ca['tipo']="ESTUDIANTE";
                $ninodomiciliotiene=$this->db->query("SELECT count(*) as dato FROM prestamo WHERE estado='prestado' AND presta='DOMICILIO' AND codigopersona='$cod'")->row()->dato;
                $ninosalatiene=$this->db->query("SELECT count(*) as dato FROM prestamo WHERE estado='prestado' AND presta='SALA' AND codigopersona='$cod'")->row()->dato;
                $ca['cantidaddomicilio']=$ninodomicilio-$ninodomiciliotiene;
                $ca['cantidadsala']=$ninosala-$ninosalatiene;
                echo json_encode($ca);
            }else{
                $query=$this->db->query("SELECT * FROM profesor WHERE id='$cod' AND colegio='$colegio'");
                $ca=$query->result_array();
                $profedomicilio=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='4'")->row()->dato;
                $profesala=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='5'")->row()->dato;
                $ca['tipo']="PROFESOR";
                $profedomiciliotiene=$this->db->query("SELECT count(*) as dato FROM prestamo WHERE estado='prestado' AND presta='DOMICILIO' AND codigopersona='$cod'")->row()->dato;
                $profesalatiene=$this->db->query("SELECT count(*) as dato FROM prestamo WHERE estado='prestado' AND presta='SALA' AND codigopersona='$cod'")->row()->dato;
                $ca['cantidaddomicilio']=$profedomicilio-$profedomiciliotiene;
                $ca['cantidadsala']=$profesala-$profesalatiene;
                echo json_encode($ca);
            }
//        if ($tipo=="ESTUDIANTE"){
//            $query=$this->db->query("SELECT * FROM estudiante WHERE id='$cod'");
//        }else{
//            $query=$this->db->query("SELECT * FROM profesor WHERE id='$cod'");
//        }

    }
    function boleta($id){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        $row=$this->db->query("SELECT lote,persona,fecha,persona,fechadevo,estado,tipo,presta,codigopersona,count(*)  as cantidad FROM `prestamo`            
WHERE lote='$id'
GROUP BY persona,fecha,persona,estado,fechadevo,estado,tipo,presta,codigopersona")->row();
        if ($row->tipo=='ESTUDIANTE'){
            $tipo="ESTUDIANTE[X]     PROFESOR[  ]";
            $diaspresta=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='3'")->row()->dato;
        }else{
            $tipo="ESTUDIANTE[  ]     PROFESOR[X]";
            $diaspresta=$this->db->query("SELECT * FROM configuracion WHERE idconfiguracion='6'")->row()->dato;
        }
        if ($row->presta=='SALA'){
            $pre="PRESTAMO A DOMICILIO($diaspresta DIAS)[  ]        CONSULTA EN SALA[X]";
        }else{
            $pre="PRESTAMO A DOMICILIO($diaspresta DIAS)[X]        CONSULTA EN SALA[  ]";
        }

        $pdf->SetFont('times','B',15,'',false);
        $pdf->Image('img/ayni.jpg',65,2,9);
        $pdf->Text(10,2,"BIBLIOTECA ESCOLAR",false,false,true,0,1,'C');
        $pdf->SetFont('times','B',12,'',false);
        $pdf->Text(10,10,"BOLETA DE PRESTAMO",false,false,true,0,0,'L');
        $pdf->Text(80,10,"FECHA: ".date('Y-m-d'),false,false,true,0,0,'R');
        $pdf->Rect(10,15,190,16);
        $pdf->SetFont('times','',10,'',false);
        $pdf->Text(12,16,"NOMBRE:    ".$row->persona."    COLEGIO:".$_SESSION['colegio'],false,false,true,0,0,'L');
        $pdf->Text(12,21,"CODIGO:     ".$row->codigopersona,false,false,true,0,0,'L');
        $pdf->Text(12,26,"TIPO:            ".$tipo,false,false,true,0,0,'L');

        $query2=$this->db->query("SELECT * FROM prestamo WHERE lote='$row->lote' ORDER BY idprestamo");
        $codigos="";
        $libros="";
        $y=34;
        foreach ($query2->result() as $row2){
//            $codigos=$codigos.$row2->codigolibro.'<br>';
//            $libros=$libros.$row2->titulo.'<br>';
            $pdf->Text(12,$y,"TITULO:".$row2->titulo."  CODIGO: ".$row2->codigolibro,false,false,true,0,0,'L');
            $y=$y+3;
            $pdf->Text(12,$y,"AUTORES:".$row2->autor."  TEMATICA: ".$row2->tematica,false,false,true,0,0,'L');
            $y=$y+4;
//            $pdf->Text(12,$y,"CLASIFICACIÒN:  ".$row2->tematica,false,false,true,0,0,'L');
//            $y=$y+3;
        }
        $pdf->Rect(10,33,190,$y-34+5);
        $pdf->Text(12,$y,$pre,false,false,true,0,0,'C');
        $y=$y+4;
        $pdf->Text(11,$y,"NUMERO DE ADJUDICION:  ".$id,false,false,true,0,0,'L');
        $pdf->Output('example_006.pdf', 'I');
        exit;
    }
    function insert(){
        $codigo=trim($_POST['codigo']);
        $presta= trim( $_POST['presta']);



        $colegio=$_SESSION['colegio'];
        $nombre=$_SESSION['nombre'];
        $fecha=date("Y-m-d H:i:s");
        $query=$this->db->query("SELECT * FROM estudiante WHERE id='$codigo'");
        if ($query->num_rows()>0){
            $persona=$query->row()->nombre;
            $codigopersona=$query->row()->id;
            $tipo="ESTUDIANTE";
        }else{
            $query=$this->db->query("SELECT * FROM profesor WHERE id='$codigo'");
            $persona=$query->row()->nombre;
            $codigopersona=$query->row()->id;
            $tipo="PROFESOR";
        }
        $query=$this->db->query("SELECT lote FROM prestamo GROUP BY lote ORDER BY lote DESC ");
        $lote=$query->row()->lote+1;
        $query=$this->db->query("SELECT * FROM libro");
        foreach ($query->result() as $row){
            if (isset($_POST['l'.$row->idlibro])){
//                echo $_POST['l'.$row->idlibro]."<br>";
                       $this->db->query("INSERT INTO prestamo SET
        tipo='$tipo',
        presta='$presta',
        colegio='$colegio',
        usuario='$nombre',
        titulo='$row->titulo',
        persona='$persona',
        codigolibro='$row->codigo',
        codigopersona='$codigopersona',
        autor='$row->autor',
        tematica='$row->tematica',
        lote='$lote',
        fecha='$fecha'
        ");
            }
        }
        //        $codigo=trim($_POST['codigo']);
//        $libro= trim( $_POST['libro']);
//        $presta= trim( $_POST['presta']);
//
//        $colegio=$_SESSION['colegio'];
//        $nombre=$_SESSION['nombre'];
//
//        $row=$this->db->query("SELECT * FROM libro WHERE codigo='$libro'")->row();
//        $titulo=$row->titulo;
//
//        $query=$this->db->query("SELECT * FROM estudiante WHERE id='$codigo'");
//        if ($query->num_rows()>0){
//            $tipo="ESTUDIANTE";
//        }else{
//            $tipo="PROFESOR";
//        }
//
//
//        if ($tipo=="ESTUDIANTE"){
//            $row=$this->db->query("SELECT * FROM estudiante WHERE id='$codigo'")->row();
//            $id=$row->idestudiante;
//            $persona=$row->nombre;
//        }else{
//            $row=$this->db->query("SELECT * FROM profesor WHERE id='$codigo'")->row();
//            $id=$row->idprofesor;
//            $persona=$row->nombre;
//        }
//       $this->db->query("INSERT INTO prestamo SET
//tipo='$tipo',
//colegio='$colegio',
//usuario='$nombre',
//presta='$presta',
//titulo='$titulo',
//persona='$persona',
//presta=''
//");
        header("Location: ".base_url()."Prestamos");

    }
}
