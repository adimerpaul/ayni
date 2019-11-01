<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Colegio</th>
            <th>Categoria</th>
            <th>Paralelo</th>
            <th>Id</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM estudiante ");
        }else{
            $query=$this->db->query("SELECT * FROM estudiante WHERE  colegio='$colegio'");
        }
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->nombre</td>
                    <td>$row->colegio</td>
                    <td>$row->categoria</td>
                    <td>$row->nivel $row->paralelo</td>
                    <td>$row->id</td>
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
