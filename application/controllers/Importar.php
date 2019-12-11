<?php
class Importar extends CI_Controller{
    function index(){
        if (!isset($_SESSION['profesion'])) {
            header('Location: ' . base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('importar');
        $this->load->view('templates/footer');
    }
    function prestamos(){
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
                $insert_csv['fecha'] = $csv_line[0];
                $insert_csv['fechadevo'] = $csv_line[1];
                $insert_csv['estado'] = $csv_line[2];
                $insert_csv['tipo'] = $csv_line[3];
                $insert_csv['presta'] = $csv_line[4];
                $insert_csv['colegio'] = $csv_line[5];
                $insert_csv['usuario'] = $csv_line[6];
                $insert_csv['titulo'] = $csv_line[7];
                $insert_csv['persona'] = $csv_line[8];
                $insert_csv['codigolibro'] = $csv_line[9];
                $insert_csv['codigopersona'] = $csv_line[10];
                $insert_csv['autor'] = $csv_line[11];
                $insert_csv['tematica'] = $csv_line[12];
                $insert_csv['lote'] = $csv_line[13];
            }
            $i++;
            $colegio=$insert_csv['colegio'];
            $fecha=$insert_csv['fecha'];
            $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
            FROM prestamo
            WHERE colegio='$colegio' AND MONTH(fecha) =MONTH('$fecha') AND YEAR(fecha) =YEAR('$fecha')
            GROUP BY YEAR(fecha),MONTH(fecha) ");
            if ($query->num_rows()>0 && $im==false){
                echo "Ya existe";
                exit;
            }else{
                $this->db->insert('prestamo',array(
                    'fecha'=>$insert_csv['fecha'],
                    'fechadevo'=>$insert_csv['fechadevo'],
                    'estado'=>$insert_csv['estado'],
                    'tipo'=>$insert_csv['tipo'],
                    'presta'=>$insert_csv['presta'],
                    'colegio'=>$insert_csv['colegio'],
                    'usuario'=>$insert_csv['usuario'],
                    'titulo'=>$insert_csv['titulo'],
                    'persona'=>$insert_csv['persona'],
                    'codigolibro'=>$insert_csv['codigolibro'],
                    'codigopersona'=>$insert_csv['codigopersona'],
                    'autor'=>$insert_csv['autor'],
                    'tematica'=>$insert_csv['tematica'],
                    'lote'=>$insert_csv['lote']
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
        echo "<meta http-equiv='refresh' content='2; url=".base_url()."Importar'>";
        return $data;

    }

        function libros(){
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
        echo "<meta http-equiv='refresh' content='2; url=".base_url()."Importar'>";
        return $data;

    }
    function librosE($anio,$mes){
        // file name
        $filename = 'libros_'.'_'.$anio.'_'.$mes.'.csv';
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
 FROM libro WHERE  YEAR(fecha)='$anio' AND MONTH(fecha)='$mes'")->result_array();
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
    function uploadData()
    {
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
                $insert_csv['nombre'] = $csv_line[1];
                $insert_csv['nivel'] = $csv_line[2];
                $insert_csv['id'] = $csv_line[3];
                $insert_csv['fecha'] = $csv_line[4];
                $insert_csv['categoria'] = $csv_line[5];
                $insert_csv['telefono'] = $csv_line[6];
                $insert_csv['estado'] = $csv_line[7];
                $insert_csv['pre'] = $csv_line[8];
            }
            $i++;
            $colegio=$insert_csv['colegio'];
            $fecha=$insert_csv['fecha'];

            $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
            FROM estudiante
            WHERE colegio='$colegio' AND MONTH(fecha) =MONTH('$fecha') AND YEAR(fecha) =YEAR('$fecha')
            GROUP BY YEAR(fecha),MONTH(fecha) ");
            if ($query->num_rows()>0 && $im==false){
                echo "Ya existe";
                exit;
            }else{

                $data = array(
                    'colegio' => $insert_csv['colegio'] ,
                    'nombre' => $insert_csv['nombre'] ,
                    'nivel' => $insert_csv['nivel'],
                    'id' => $insert_csv['id'],
                    'fecha' => $insert_csv['fecha'],
                    'categoria' => $insert_csv['categoria'],
                    'telefono' => $insert_csv['telefono'],
                    'estado' => $insert_csv['estado'],
                    'pre' => $insert_csv['pre']
                );
                $this->db->insert('estudiante',$data);
                $im=true;
            }


//            var_dump($data);
//                $data['crane_features']=$this->db->insert('tableName', $data);
//            echo $insert_csv['nombre']."<br>";

        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        echo "Se importo correctamente datos";
        echo "<meta http-equiv='refresh' content='2; url=".base_url()."Importar'>";
        return $data;

    }
    function importcsv() {
        $this->load->library('csvimport');
        $data['error'] = '';    //initialize image upload error array to empty
        //convigure upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000';
        $this->load->library('upload', $config);
        // jika upload gagal, muncul error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

        } else {
            //prosses upload csv berhasil serta memproses insert data ke database
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'firstname'=>$row['firstname'],
                        'lastname'=>$row['lastname'],
                        'phone'=>$row['phone'],
                        'email'=>$row['email'],
                    );
//                    $this->csv_model->insert_csv($insert_data);

                }
                var_dump($csv_array);
                //echo "<pre>"; print_r($insert_data);
            } else
                $data['error'] = "Error occured";
//            $this->load->view('csvindex', $data);
        }
    }
}
