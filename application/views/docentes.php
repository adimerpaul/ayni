<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Colegio</th>
            <th>Profesion</th>
            <th>Usuario</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM profesor WHERE nombre!='AYNI'");
        }else{
            $query=$this->db->query("SELECT * FROM profesor WHERE nombre!='AYNI' AND colegio='$colegio'");
        }
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->nombre</td>
                    <td>$row->celular</td>
                    <td>$row->colegio</td>
                    <td>$row->profesion</td>
                    <td>$row->usuario</td>
                    <td>$row->estado</td>
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
