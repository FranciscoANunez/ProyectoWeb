<?php

include_once '../scripts/BDConnect.php';

$opcion=$conn->real_escape_string($_POST['txtOpc']);

switch($opcion){
    

    case('add'):
//contruir query para insercion
$tipo=$conn->real_escape_string($_POST['txttipo']);
$usuario=$conn->real_escape_string($_POST['txtNombre']);
$contra=$conn->real_escape_string($_POST['txtContrasena']);
$correo=$conn->real_escape_string($_POST['txtCorreo']);

    $strQry ="INSERT INTO usuarios (usuario,password,idTipoUsuario,email)
     values 
     ('$usuario','$contra','$tipo','$correo')";
     $_SESSION['user']=$usuario;
     $_SESSION['type']=$tipo;
     $_SESSION['mail']=$correo;

     if(!$conn->query($strQry)){
         echo ("$strQry");
         die ('Error: no se ejecuta');
     }
     echo "<script type='text/javascript'> top.location.href='../index.php';</script>";
     break;
     
}