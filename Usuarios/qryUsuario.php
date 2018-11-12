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
<<<<<<< HEAD
     echo "<script type='text/javascript'> top.location.href='../index.php';</script>";
=======
     //echo "<script type='text/javascript'> window.location.href='../index.php';</script>";
>>>>>>> 3d79d5647c370c4774aa1f271aaa4c7542267bae
     break;
     
}