<?php

include_once('core/main.php');
//include_once('functions.php');
$_POST["contasenia"] = "prueba";
$pass = $_POST["contasenia"];
$pass = md5($pass);
$query = "select * from usuario where user = '' and pass = '{$pass}'";




$pass = md5($pass);

$query = "insert into user (username, password) values ('juanito', '{$pass}')";



if( isset($_GET["action"]) ){

    if( $_GET["action"] == "busquedaPaciente" ){

        $filter = "";
        if( !empty($_GET["cui"]) )
            $filter .= "AND id LIKE '%".trim($_GET["cui"])."%'";
        
        if( !empty($_GET["name"]) )
            $filter .= " AND (nombre LIKE '%".trim($_GET["name"])."%' OR apellido LIKE '%".trim($_GET["name"])."%')";

        $query = "SELECT id, nombre, apellido, TO_CHAR(fecha_nac,'yyyy-mm-dd') fecha, genero
                  FROM pac 
                  WHERE cod_estado = 1
                  {$filter}
                  ORDER BY id";
        $qTMP = db_query($query);

        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Fecha nacimiento</th>
                    <th>Genero</th>
                    <th>Ver Expediente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($rTMP = db_fetch_array($qTMP)){
                    ?>
                    <tr>
                        <td><?php print $rTMP["ID"]; ?></td>
                        <td><?php print $rTMP["NOMBRE"]." ".$rTMP["APELLIDO"]; ?></td>
                        <td><?php print $rTMP["FECHA"]; ?></td>
                        <td><?php print $rTMP["GENERO"]; ?></td>
                        <td>
                            <i class="demo-psi-file" style="cursor:pointer;" title="Expediente" onclick="document.location.href='<?php print $baseurl; ?>expediente.php?id=<?php print $rTMP['ID']; ?>';"></i>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        db_free_result($qTMP);
        
    }

    die();
}

