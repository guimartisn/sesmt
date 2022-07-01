<?php
require_once('../conexao.php');
 
$tipo_id =$_GET['tipo'];
$sql = "SELECT * FROM equipamento WHERE equipamento_tipo = $tipo_id";
$dados = mysqli_query($conn,$sql) or die(mysqli_connect_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);
if($total > 0) {
        do {
        echo "<option value='".$linha['equipamento_id']."'>".$linha['equipamento_nome']."</option>";
        }while($linha = mysqli_fetch_assoc($dados));
    }

?>