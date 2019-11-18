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
                $insert_csv['fecha'] = $csv_line[0];//remove if you want to have primary key,
                $insert_csv['idlibro'] = $csv_line[1];
                $insert_csv['id'] = $csv_line[2];
                $insert_csv['fechadevo'] = $csv_line[3];
                $insert_csv['estado'] = $csv_line[4];
                $insert_csv['tipo'] = $csv_line[5];
                $insert_csv['presta'] = $csv_line[6];
                $insert_csv['colegio'] = $csv_line[7];
                $insert_csv['usuario'] = $csv_line[8];
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
                    'estado' => $insert_csv['estado'] ,
                    'idlibro' => $insert_csv['idlibro'] ,
                    'id' => $insert_csv['id'],
                    'fechadevo' => $insert_csv['fechadevo'],
                    'fecha' => $insert_csv['fecha'],
                    'tipo' => $insert_csv['tipo'],
                    'presta' => $insert_csv['presta'],
                    'colegio' => $insert_csv['colegio'],
                    'usuario' => $insert_csv['usuario']
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
    /*
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
                $insert_csv[''] = $csv_line[7];
                $insert_csv['usuario'] = $csv_line[8];
                ,
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
                    'estado' => $insert_csv['estado'] ,
                    'idlibro' => $insert_csv['idlibro'] ,
                    'id' => $insert_csv['id'],
                    'fechadevo' => $insert_csv['fechadevo'],
                    'fecha' => $insert_csv['fecha'],
                    'tipo' => $insert_csv['tipo'],
                    'presta' => $insert_csv['presta'],
                    'colegio' => $insert_csv['colegio'],
                    'usuario' => $insert_csv['usuario']
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
*/
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
            FROM prestamo
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