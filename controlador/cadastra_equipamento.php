<?php       
require_once("../conexao.php");
require_once("../view/navbar_geral.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-login100">
        <form action="../controlador/cadastra_equipamento.php" method="POST">
            <div class="form-group row">
                <div class="form-cadastrar">
                    <h1>cadastrou com sucesso</h1>
                    <?php
                        $serie = $_POST["serie"];
                        $laudo = $_POST["laudo"];
                        $ca = $_POST["ca"];
                        $marca = $_POST['marca'];
                        $responsavel= $_POST['responsavel'];
                        $tipo = $_POST["tipo"]; 
                        $equipamento = $_POST["equipamento"]; 
                        $colaboradores = $_POST["colaboradores"]; 
                        $dt_fab = $_POST["dt_fab"];
                        $dt_entrega = $_POST["dt_entrega"];
                        $iduser =$_SESSION['usuarioId']; 
                        $city = $_SESSION['cidad'];
                        $classe_item=$_POST['classe'];
                        $sql = "insert into itens (item_num_serie, item_num_laudo, item_num_ca,item_nome_marca, item_nome_resp, tipo_itens, equip_itens, colab_itens, item_data_fab, item_data_entrega, usuario_itens, item_cidade, classe_itens)
                        values ( '$serie', '$laudo', '$ca','$marca', '$responsavel','$tipo','$equipamento','$colaboradores', '$dt_fab', '$dt_entrega','$iduser','$city','$classe_item')";
                        $result= mysqli_query($conn, $sql)
                    ?>
                </div>
            </div>
        </form>
    </div>
    <!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

</body>

</html>