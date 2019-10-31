<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <div class="row">
        <div class="col-12">
            <h4>Libros</h4>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM libro
WHERE colegio='$colegio'
GROUP BY YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->anio</td>
                            <td>$row->mes</td>
                            <td>$row->cantidad</td>
                            <td> <a class='btn btn-info p-1' href='".base_url()."Exportar/libros/$row->anio/$row->mes'><i class='fa fa-cogs'></i>Exportar</a>  </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Profesores</h4>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM profesor
WHERE colegio='$colegio'
GROUP BY YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->anio</td>
                            <td>$row->mes</td>
                            <td>$row->cantidad</td>
                            <td> <a class='btn btn-info p-1' href='".base_url()."Exportar/profesores/$row->anio/$row->mes'><i class='fa fa-cogs'></i>Exportar</a>  </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Prestamos</h4>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM prestamo
WHERE colegio='$colegio'
GROUP BY YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->anio</td>
                            <td>$row->mes</td>
                            <td>$row->cantidad</td>
                            <td> <a class='btn btn-info p-1' href='".base_url()."Exportar/prestamos/$row->anio/$row->mes'><i class='fa fa-cogs'></i>Exportar</a>  </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Alumnos</h4>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>AÑO</th>
                        <th>MES</th>
                        <th>CANTIDAD</th>
                        <th>Exportar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM estudiante
WHERE colegio='$colegio'
GROUP BY YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->anio</td>
                            <td>$row->mes</td>
                            <td>$row->cantidad</td>
                            <td> <a class='btn btn-info p-1' href='".base_url()."Exportar/archivo/$row->anio/$row->mes'><i class='fa fa-cogs'></i>Exportar</a>  </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
</div>
