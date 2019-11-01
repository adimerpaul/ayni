<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>NroSerie</th>
            <th>Nroalcaldia</th>
            <th>autor</th>
            <th>Titulo</th>
            <th>Original</th>
            <th>Anio edicion</th>
            <th>Editorial</th>
            <th>Procedencia</th>
            <th>Estado</th>
            <th>Idioma</th>
            <th>Nivelno</th>
            <th>Nivel</th>
            <th>Codarea</th>
            <th>Area</th>
            <th>Codsubarea</th>
            <th>Tematica</th>
            <th>Codigo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM libro");
        }else{
            $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio'");
        }
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->nroserie</td>
                    <td>$row->nroalcaldia</td>
                    <td>$row->autor</td>
                    <td>$row->titulo</td>
                    <td>$row->original</td>
                    <td>$row->anioedicion</td>
                    <td>$row->editorial</td>
                    <td>$row->procedencia</td>
                    <td>$row->estado</td>
                    <td>$row->idioma</td>
                    <td>$row->nivelno</td>
                    <td>$row->nivel</td>
                    <td>$row->codarea</td>
                    <td>$row->area</td>
                    <td>$row->codsubarea</td>
                    <td>$row->tematica</td>
                    <td>$row->codigo</td>
                </tr>";
        }
        ?>

        </tbody>
    </table>
</div>
<script>
    window.onload=function (e) {
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    }
</script>
