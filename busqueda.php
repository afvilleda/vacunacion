<?php
include_once('core/main.php');
include_once('functions.php');

draw_header(true, "Búsqueda de pacientes xD");
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
        
    </script>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">            
            <div class="panel panel-body">
                <div class="panel-heading">
                    <h4>Ingrese datos de búsqueda</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">CUI</label>
                                <input type="text" id="cui" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Nombre paciente</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-default" type="button">Crear paciente</button>    
                            <button class="btn btn-primary" type="button" onclick="buscarPaciente();">Realizar búsqueda</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive" id="contentResult"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
draw_footer();
?>