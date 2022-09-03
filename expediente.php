<?php
include_once('core/main.php');
include_once('functions.php');

draw_header(true, "Expediente");

    $id = 0;
    $data = [];
    $deptos = [];
    $municipios = [];
    if( isset($_GET["id"]) ){
        $id = $_GET["id"];

        $query = "SELECT pac.*, TO_CHAR(fecha_nac,'yyyy-mm-dd') AS fecha_nac
                  FROM pac 
                  WHERE id = {$id}";
        $qTMP = db_query($query);
        $data = db_fetch_array($qTMP);


        $query = "SELECT muni.*
                  FROM  muni 
                  WHERE cod_depto = {$data["COD_DEPTO"]}
                  ORDER BY nombre";
        $qTMP = db_query($query);
        while( $rTMP = db_fetch_array($qTMP) ) {
            $municipios[$rTMP["ID"]] = $rTMP["NOMBRE"];
        }
        
    }

    $query = "SELECT depa.*
              FROM  depa 
              ORDER BY nombre";
    $qTMP = db_query($query);
    while( $rTMP = db_fetch_array($qTMP) ) {
        $deptos[$rTMP["ID"]] = $rTMP["NOMBRE"];
    }
    
    /*$query = "select * from depa";
    $qTMP = db_query($query);
    print "<pre>";
    while($rTMP = db_fetch_array($qTMP)){
        print $rTMP["ID"]." - ".$rTMP["NOMBRE"]."<br>";
    }
    print "</pre>";*/

    /*
    print "<pre>";
    //print_r($deptos);
    //print_r($municipios);
    print_r($data);
    print "</pre>";
    */
    ?>

    <script type="text/javascript">
        
        

        function buscarPaciente(){
            $.ajax({
                url: "<?php print $baseurl; ?>ajax.php?action=busquedaPaciente&cui="+$("#cui").val()+"&name="+$("#name").val(),
                async: false,
                success: function(data){
                    $("#contentResult").html("");
                    $("#contentResult").html(data);
                }
            });
        }

        $( document ).ready(function() {
            $('#birthday').mask('99/99/9999');
        });
    </script>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            
            <div class="panel panel-body">
                <div class="panel-heading">
                    <h4>Datos del paciente</h4>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">CUI</label>
                                <?php
                                if( $id ){
                                    ?>
                                    <label class="form-control" style="border:0px !important;">AAA<label>
                                    <?php
                                }
                                else{
                                    ?>
                                    <input type="text" id="cui" class="form-control" <?php print $id ? "disabled" : ""; ?>>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Nombres</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Apellidos</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Fecha de nacimiento</label>
                                <input type="text" id="birthday" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Genero</label>
                                <select name="genero" class="form-control">
                                    <option value="0">Elige una opcion...</option>
                                    <option value="M" <?php print ( $id && $data["GENERO"] == "M") ? "selected" : ""; ?>>Masculino</option>
                                    <option value="F" <?php print ( $id && $data["GENERO"] == "F") ? "selected" : ""; ?>>Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Departamento</label>
                                <select id="departamento" name="departamento" class="form-control">
                                    <option value="0">Elige una opcion...</option>
                                    <?php
                                    while( $tmp = each($deptos) ){
                                        ?>
                                        <option value="<?php print $tmp["key"]; ?>" <?php print ( $id && $data["COD_DEPTO"] == $tmp["key"]) ? "selected" : ""; ?>><?php print $tmp["value"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Municipio</label>
                                <select id="municipio" name="municipio" class="form-control">
                                    <option value="0">Elige una opcion...</option>
                                    <?php
                                    if( count($municipios) ){
                                        while( $tmp = each($municipios) ){
                                            ?>
                                            <option value="<?php print $tmp["key"]; ?>" <?php print ($data["COD_MUNI"] == $tmp["key"]) ? "selected" : ""; ?>><?php print $tmp["value"]; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h5>Datos del los padres</h5>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Nombres del padre</label>
                                <input type="text" id="cui" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Apellidos del padre</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Nombres de la madre</label>
                                <input type="text" id="cui" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Apellidos de la madre</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h5>Información de vacunas</h5>
                    </div>

                    <div class="row">
                        
                        <div class="panel-group accordion" id="accordion">
                            <div class="panel panel-bordered panel-primary">
                
                                <!--Accordion title-->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-parent="#accordion" data-toggle="collapse" href="#collapseOne">Dosis disponibles</a>
                                    </h4>
                                </div>
                
                                <!--Accordion content-->
                                <div class="panel-collapse collapse" id="collapseOne">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bordered panel-mint">
                
                                <!--Accordion title-->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">Dosis suministradas</a>
                                    </h4>
                                </div>
                
                                <!--Accordion content-->
                                <div class="panel-collapse collapse" id="collapseTwo">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-bordered panel-danger">
                
                                <!--Accordion title-->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-parent="#accordion" data-toggle="collapse" href="#collapseThree">Dosis vencidas</a>
                                    </h4>
                                </div>
                
                                <!--Accordion content-->
                                <div class="panel-collapse collapse" id="collapseThree">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary" type="button" onclick="buscarPaciente();">Guardar</button>    
                        </div>
                    </div>
                </div>

                <!--<form class="form-horizontal" action="ingreso.php" method="POST">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Nombre" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="descripcion">Descripción</label>
                            <div class="col-sm-9">
                                <textarea placeholder="Descripcion" rows="5" id="descripcion" name="descripcion" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="tiempo">Tiempo de ejecución</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="3 Semanas" id="tiempo" name="tiempo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="costo">Costo</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Costo" id="costo" name="costo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="personas">Cantidad de personas necesarias</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="" id="personas" name="personas" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="areas">Áreas que mejoran</label>
                            <div class="col-sm-9">
                                <select id="areas" name="areas">
                                    <option value="0">Elige una opcion...</option>
                                    <?php
                                    /*while( $tmp = each($areas) ){
                                        ?>
                                        <option value="<?php print $tmp["key"]; ?>"><?php print $tmp["value"]; ?></option>
                                        <?php
                                    }*/
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="riesgos">Riesgos</label>
                            <div class="col-sm-9">
                                <textarea placeholder="Riesgos" rows="5" id="riesgos" name="riesgos" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                </form>-->
            </div>

        </div>
    </div>
    <?php
draw_footer();
?>