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
function Importprestamos(){
        $count=0;
        $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
        $im=false;
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['colegio'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['nroserie'] = $csv_line[1];
                $insert_csv['nroalcaldia'] = $csv_line[2];
                $insert_csv['autor'] = $csv_line[3];
                $insert_csv['titulo'] = $csv_line[4];
                $insert_csv['original'] = $csv_line[5];
                $insert_csv['anioedicion'] = $csv_line[6];
                $insert_csv['editorial'] = $csv_line[7];
                $insert_csv['procedencia'] = $csv_line[8];
                $insert_csv['estado'] = $csv_line[9];
                $insert_csv['idioma'] = $csv_line[10];
                $insert_csv['nivelno'] = $csv_line[11];
                $insert_csv['nivel'] = $csv_line[12];
                $insert_csv['codarea'] = $csv_line[13];
                $insert_csv['area'] = $csv_line[14];
                $insert_csv['codsubarea'] = $csv_line[15];
                $insert_csv['tematica'] = $csv_line[16];
                $insert_csv['codigo'] = $csv_line[17];
                $insert_csv['fecha'] = $csv_line[18];
                $insert_csv['incremento'] = $csv_line[19];
            }
            $i++;
            $colegio=$insert_csv['colegio'];
            $fecha=$insert_csv['fecha'];
            $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
            FROM libro
            WHERE colegio='$colegio' AND MONTH(fecha) =MONTH('$fecha') AND YEAR(fecha) =YEAR('$fecha')
            GROUP BY YEAR(fecha),MONTH(fecha) ");
            if ($query->num_rows()>0 && $im==false){
                echo "Ya existe";
                exit;
            }else{


                $this->db->insert('libro',array(
                    'colegio' => $insert_csv['colegio'],
                    'nroserie' => $insert_csv['nroserie'],
                    'nroalcaldia'=> $insert_csv['nroalcaldia'],
                    'autor'=> $insert_csv['autor'],
                    'titulo'=> $insert_csv['titulo'],
                    'original'=> $insert_csv['original'],
                    'anioedicion'=> $insert_csv['anioedicion'],
                    'editorial'=> $insert_csv['editorial'],
                    'procedencia'=> $insert_csv['procedencia'],
                    'estado'=> $insert_csv['estado'],
                    'idioma'=> $insert_csv['idioma'],
                    'nivelno'=> $insert_csv['nivelno'],
                    'nivel'=> $insert_csv['nivel'],
                    'codarea'=> $insert_csv['codarea'],
                    'area'=> $insert_csv['area'],
                    'codsubarea'=> $insert_csv['codsubarea'],
                    'tematica'=> $insert_csv['tematica'],
                    'codigo'=> $insert_csv['codigo'],
                    'fecha'=> $insert_csv['fecha'],
                    'incremento'=> $insert_csv['incremento']
                ));
                $im=true;
            }


//            var_dump($data);
//                $data['crane_features']=$this->db->insert('tableName', $data);
//            echo $insert_csv['nombre']."<br>";

        }
        fclose($fp) or die("can't close file");

        $data['success']="success";
        echo "Se importo correctamente datos";
        echo "<meta http-equiv='refresh' content='2; url=".base_url()."Exportar'>";
        return $data;


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
anioedicion,
editorial,
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
            "anioedicion",
            "editorial",
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
autor,
tematica,
lote
 FROM prestamo WHERE colegio='$colegio'AND  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes' ORDER BY idprestamo")->result_array();
//    exit;
    // file creation
    $file = fopen('php://output', 'w');
    $header = array(
        "fecha",
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
        "autor",
        "tematica",
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
