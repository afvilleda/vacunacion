<?php

function db_connect_database(){

    global $globalConnection;

    if( $globalConnection !== null ){

        $globalConnection = oci_connect('clinica', 'clinica', "host.docker.internal");

        if (!$globalConnection) {
            $e = oci_error();
            //die(print_r($e['message']));
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
	}
}

function db_close(){

    global $globalConnection;
    
    return oci_close($globalConnection);
}

function db_query($query){

    global $globalConnection;

    $qTMP = oci_parse($globalConnection,$query);
    oci_execute($qTMP);

    $error = oci_error($qTMP);
    if (is_array($error)){
        print_r("<hr>{$error}<br><hr>");
        $return = false;
    }
    else
        $return = $qTMP;

	return $return;
}

function db_fetch_array($query){
    return oci_fetch_array($query);
}

function db_free_result($query) {
    oci_free_statement($query);
    return;
}

