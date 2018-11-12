<?php

include_once '../scripts/BDConnect.php';
?>
<html>
    <head>
        <title>
            Agregar un usuario
        </title>
    </head>
    <body onLoad="javascript:document.getElementById('txtNoControl').focus()">
        <form id='frmAddUsuario' name='frmAddUsuario' action='./qryUsuario.php' method='POST'>
        <table align='center' border="0">
            <tr height='50'>
                <td colspan='2' align='center'>
                    <b> Agregando Registros de Alumnos </b>
                    <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
                    <input type='hidden' id='txttipo' name='txttipo' value='N'>
                </td>
            </tr>
            <tr>
                <td>
                    Usuario
                </td>
                <td>
                    <input type='text' id='txtNombre' name='txtNombre' maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    Contraseña
                </td>
                <td>
                    <input type='password' id='txtContrasena' name='txtContrasena' maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    Correo electronico
                </td>
                <td>
                    <input type='text' id='txtCorreo' name='txtCorreo' maxlength="40">
                </td>
            </tr>
        </table>
        <table align="center">
            <tr height="50px">
                <td align='center'>
                    <input class="submit" type="submit" value="Grabar" id="btnGrabar" name="btnGrabar" style="width: 100px" onclick="validaForma()">
                </td>
                <td colspan='2' align='center'><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onclick="javascript: window.location.href='./index.php'">
                </td>
            </tr>
            <tr height="60 px">
                <td colspan="2">
                    <font color="red">
                        <div id="msgError">
                        </div>
                    </font>
                </td>
            </tr>
                </table>
                </form>
                <script type="text/javascript" src="../js/jquery.js"></script>
                <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
                <script type="text/javascript">
                function validaForma(){
                    $("#frmAddAlumnos").validate({
                        rules: {txtContrasena:"required",
                                txtNombre: "required",
                                txtCorreo: "required",
                         messages: {txtContrasena:"Se requiere este dato",
                                txtNombre: "Se requiere este dato",
                                txtCorreo: "Se requiere este dato",
                            submitHandler: function(form){
                                $.ajax({url: frmAddUsuario.action , type: frmAddUsuario.method , data: $(form).serialize(), success: function(response) {$('#msgError').html(response);}});
                            }
                    });
                }
                </script>
                </body>
                </html>
            