<?php
require_once("../conexao.php");
require_once("../view/navbar_geral.php");

$sql = "SELECT * FROM tipo";
$dados = mysqli_query($conn, $sql) or die(mysqli_connect_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);

// Verifica se a conexão não funcionou...
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
} else {
}

$sql = "SELECT * FROM classe";
$da = mysqli_query($conn, $sql) or die(mysqli_connect_error());
$li = mysqli_fetch_assoc($da);
$to = mysqli_num_rows($da);

// Verifica se a conexão não funcionou...
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
} else {
}

$sql = "SELECT * FROM colaboradores";
$dad = mysqli_query($conn, $sql) or die(mysqli_connect_error());
$lin = mysqli_fetch_assoc($dad);
$tot = mysqli_num_rows($dad);

// Verifica se a conexão não funcionou...
if (!$conn) {
    die("A conexão com o banco de dados falhou: " . mysqli_connect_error());
} else {
}

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
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login200">
                <form action="../controlador/cadastra_equipamento.php" class="login100-form2" method="POST">
                    <div class="form-div2">
                        <div class="wrap-input100" data-validate="Usuário é necessário">
                            <select name="tipo" id="tipo">
                                <option value="" selected=selected>Tipo de Equipamento</option>
                                <?php
                                if ($total > 0) {
                                    do {
                                        echo "<option value='" . $linha['tipo_id'] . "'>" . $linha['tipo_nome'] . "</option>";
                                    } while ($linha = mysqli_fetch_assoc($dados));
                                }
                                ?>
                            </select>
                        </div>

                        
                        <div class="wrap-input100" data-validate="">
                            <select name="equipamento" id="equipamento">
                                <option value="" selected=selected>Equipamento</option>
                            </select>
                        </div>

                        <div class="wrap-input100" data-validate="">
                            <select name="classe" id="classe">
                                <option value="" selected=selected>Classe</option>
                                <?php
                                if ($to > 0) {
                                    do {
                                        echo "<option value='" . $li['id_classe'] . "'>" . $li['nome_classe'] . "</option>";
                                    } while ($li = mysqli_fetch_assoc($da));
                                }
                                ?>
                            </select>
                        </div>

                        <div class="wrap-input100" data-validate="">
                            <select name="colaboradores" id="colaboradores">
                                <option value="" selected=selected>Destino</option>
                                <?php
                                if ($tot > 0) {
                                    do {
                                        echo "<option value='" . $lin['id_colab'] . "'>" . $lin['nome_colab'] . "</option>";
                                    } while ($lin = mysqli_fetch_assoc($dad));
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-div">
                        <div class="wrap-input100" data-validate="Número de Série é necessário">
                            <input type="text" placeholder="Número de Série" name="serie" class="input100" placeholder="Número de Série">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100" data-validate="Requer Número do Laudo">
                            <input class="input100" type="text" placeholder="Número de Laudo" name="laudo">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100" data-validate="Requer Número do C.A">
                            <input class="input100" type="text" placeholder="C.A" name="ca">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100" data-validate="Requer Nome da Marca">
                            <input class="input100" type="text" placeholder="Nome da Marca" name="marca">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100" data-validate="Requer Resp. Teste">
                            <input class="input100" type="text" placeholder="Resp. teste" name="responsavel">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100" data-validate="Requer Data de Teste">
                            <input class="input100" type="date" name="dt_fab" placeholder="Data de Teste">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100" data-validate="Requer Data de Entrega">
                            <input class="input100" type="date" name="dt_entrega" placeholder="Data de Entrega">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <a class="text-danger">
                            <button class="login100-form-btn" type="submit">Cadastrar</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tipo').change(function() {
                $('#equipamento').load('../controlador/equipamento.php?tipo=' + $('#tipo').val());
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <?php
    mysqli_close($conn);
    ?>

</body>

</html>