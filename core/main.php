<?php
date_default_timezone_set("America/Guatemala");
header("Content-type: text/html; utf-8");

include_once("db.php");

$globalConnection = "";
db_connect_database();

$baseurl = "http://localhost/vacunacion/";
