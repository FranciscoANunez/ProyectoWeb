<?php

include_once '../scripts/BDConnect.php';

$opcion=$mysqli->real_escape_string($_POST['txtOpc']);

switch($opcion){
    

    case('add'):
//contruir query para insercion
$tipo=$mysqli->real_escape_string($_POST['txttipo']);
$usuario=$mysqli->real_escape_string($_POST['txtNombre']);
$contra=$mysqli->real_escape_string($_POST['txtContrasena']);
$correo=$mysqli->real_escape_string($_POST['txtCorreo']);

    $strQry ="INSERT INTO usuarios (usuario,password,idTipoUsuario,email)
     values 
     ('$usuario','$contra','$tipo','$correo')";
     echo "$strQry";
     if(!$mysqli->query($strQry)){
         echo ("$strQry");
         die ('Error: no se ejecuta');
     }
     //echo "<script type='text/javascript'> window.location.href='../index.php';</script>";
     break;
     
}