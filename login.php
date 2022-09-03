<?php
include_once('functions.php');

draw_header();

    ?>
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Clínicas Médicas</h1>
                    <p>Inicia sesion con tu cuenta</p>
                </div>
                <form action="index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                        <label for="demo-form-checkbox">Recordarme</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <?php

draw_footer();
?>