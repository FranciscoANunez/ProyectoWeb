<!DOCTYPE hmtl>
<html>
<head>
    <meta charset="utf-8">
    <title> Introduzca usuario valido</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/CSS">
        h1{ color: red} .color{color: blue} .fuente{font-family: arial; font-size: 20px;}
        label{position: absolute; color: red;font-style: italic;font-size: 15;  }
    </style>
</head>
<body onload="javascript: document.getElementById('txtUsuario').focus();">
<!--<center>
	<div id="carouselAuditorio" class="carousel slide" data-ride="carousel">
  		<div class="carousel-inner" >
    		<div class="carousel-item active" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="../img/auditorio1.jpg" alt="First slide">
    		</div>
    		<div class="carousel-item" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="../img/auditorio2.jpg" alt="Second slide">
    		</div>
		    <div class="carousel-item" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="../img/auditorio3.jpg" alt="Third slide">
    		</div>
  		</div>
	</div>
	</center>
    <script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
    <script>
		$('.carousel').carousel({interval: 2000});
	</script>-->
    <form id="frmAutenticar" name="frmAutenticar" action="../Sesion/querysesion.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1>Introduzca Usuario Valido</h1>
                </td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td align="center">
                    <input type="text" id="txtUsuario" name="txtUsuario">
                </td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td align="center">
                    <input type="password" id="txtPwd" name="txtPwd">
                </td>
            </tr>
        </table>
        <table align="center">
            <tr>
                <td>
                    <input class="submit" type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()">
                </td>
                <td align="center">
                    <input type="button" value="Cancelar" id="btnCancelar" onclick="limpiaaFormulario()">
                </td>
            </tr>
            
        </table>
        <table align="center">
            <tr height="60px">
                <td colspan="2">
                    <font color="red">
                        <div id="msgError"></div>
                    </font>
                </td>
            </tr>
        </table>
    </form>
    <!-- Aqui van las funciones JS y CSS-->
    <script type="text/javascript">
        function validaFormulario() {
            $("#frmAutenticar").validate();
            var txt = /([A-Z0-9\s\\]+)/i;
            if (!txt.test(frmAutenticar.txtUsuario.value)) {
            }
        }
        function limpiaaFormulario() {
            document.getElementById("txtUsuario").value = "";
            document.getElementById("txtPwd").value = "";
            document.getElementById("txtUsuario").focus();
        }
        function validaForma() {
            $("#frmAutenticar").validate({
                rules: {
                    txtUsuario: "required",
                    txtPwd: "required"
                },
                messages: {
                    txtUsuario: "se requiere este dato.",
                    txtPwd: "se requiere este dato."
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: frmAutenticar.action,
                        type: frmAutenticar.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            $('#msgError').html(response);
                        }
                    })
                }
            });
        }
    </script>
    <script type="text/javascript" src="../js/jQuery.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
</body>
</html>
