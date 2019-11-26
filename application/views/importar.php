<div class="button-ad-wrap" style="width: 100%">
    <div class="row">
        <div class="col-12">
            <h4>Prestamos</h4>
            <form action="<?=base_url()?>Importar/prestamos" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table>
                    <tr>
                        <td> Choose your file: </td>
                        <td>
                            <input type="file" class="form-control" required name="userfile" id="userfile"  align="center"/>
                        </td>
                        <td>
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" name="submit" class="btn btn-info">Save</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>COLEGIO</th>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT colegio, YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM prestamo
GROUP BY colegio, YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->colegio</td>
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
    <div class="row">
        <div class="col-12">
            <h4>Alumnos</h4>
            <form action="<?=base_url()?>Importar/uploadData"  method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table>
                    <tr>
                        <td> Choose your file: </td>
                        <td>
                            <input type="file" required class="form-control" name="userfile" id="userfile"  align="center"/>
                        </td>
                        <td>
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" name="submit" class="btn btn-info">Save</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>COLEGIO</th>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT colegio, YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM estudiante
GROUP BY colegio, YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->colegio</td>
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
    <div class="row">
        <div class="col-12">
            <h4>Libros</h4>
            <form action="<?=base_url()?>Exportar/prestamos" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table>
                    <tr>
                        <td> Choose your file: </td>
                        <td>
                            <input type="file" class="form-control" required name="userfile" id="userfile"  align="center"/>
                        </td>
                        <td>
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" name="submit" class="btn btn-info">Save</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>COLEGIO</th>
                    <th>AÑO</th>
                    <th>MES</th>
                    <th>CANTIDAD</th>
                    <th>Exportar</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $query=$this->db->query("SELECT colegio,YEAR(fecha) as anio,MONTH(fecha)as mes,count(*) as cantidad 
FROM libro
GROUP BY colegio,YEAR(fecha),MONTH(fecha)");
                foreach ($query->result() as $row){
                    echo "<tr>
                            <td>$row->colegio</td>
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
</div>
