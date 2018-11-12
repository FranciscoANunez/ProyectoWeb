<?php

session_start();
include_once '../scripts/BDConnect.php';

if(isset($_POST['btnEnviar'])){
    $_pass=$_POST['txtPwd'];
    $_user=$_POST['txtUsuario'];
    $_passsi=$conn->real_escape_string($_pass);
    $_usersi=$conn->real_escape_string($_user);
    $strQry="select * from auditorio.usuarios where usuario = '$_usersi' and password ='$_passsi'";
    $result=$conn->query($strQry);

    $row=$result->fetch_array(MYSQLI_NUM);
    $userqry=$row[0];
    $passqry=$row[1];
    $idTipoUsuario=$row[2];
    $usuariomail=$row[3];

    if($userqry==$_user and $passqry==$_pass){
        $_SESSION['user']=$userqry;
        $_SESSION['type']=$idTipoUsuario;
        $_SESSION['mail']=$usuariomail;
        ?>
            <script type="text/javascript">
            top.location.href="../index.php";
            </script>
        <?php
    }
    else{
        echo "usuario o contraseña incorrecta";
    }
}
?>