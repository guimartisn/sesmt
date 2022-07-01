<?php
require_once("../conexao.php");
require_once("../view/navbar_geral.php");


$local = $_SESSION['cidad'];
$acesso = $_SESSION['usuarioNiveisAcessoId'];
if ($acesso == 2) {
	$result_acesso = "SELECT i.*,t.tipo_nome,e.equipamento_nome,c.nome_colab,u.nome,z.nome_classe FROM itens AS i 
	INNER JOIN tipo AS t INNER JOIN equipamento AS e INNER JOIN usuarios AS u INNER JOIN colaboradores AS c INNER JOIN classe AS z 
	ON (i.tipo_itens=t.tipo_id)AND(i.equip_itens=e.equipamento_id)AND(i.colab_itens=c.id_colab)AND(i.usuario_itens=u.id)
	AND(i.classe_itens=z.id_classe) ORDER BY i.item_id ASC";
	$result = $conn->query($result_acesso);
}
if ($acesso == 3) {
	$result_acesso2 = "SELECT i.*,t.tipo_nome,e.equipamento_nome,c.nome_colab,u.nome,z.nome_classe FROM itens AS i 
	INNER JOIN tipo AS t INNER JOIN equipamento AS e INNER JOIN usuarios AS u INNER JOIN colaboradores AS c INNER JOIN classe AS z 
	ON (i.tipo_itens=t.tipo_id)AND(i.equip_itens=e.equipamento_id)AND(i.colab_itens=c.id_colab)AND(i.usuario_itens=u.id)
	AND(i.classe_itens=z.id_classe) WHERE item_cidade='$local' ORDER BY i.item_id ASC";
	$result = $conn->query($result_acesso2);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
</head>

<body>

	<table id="listar-usuario" class="display nowrap" style="width:100%">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Equipamento</th>
				<th scope="col">NºCA</th>
				<th scope="col">NºSérie</th>
				<th scope="col">NºLaudo</th>
				<th scope="col">Marca</th>
				<th scope="col">Resp. Teste</th>
				<th scope="col">vencimento</th>
				<th scope="col">Entrega</th>
				<th scope="col">Destino</th>
				<th scope="col">Tipo</th>
				<th scope="col">Classe</th>
				<th scope="col">Usuário</th>
				<th scope="col">Cidade</th>
				<th scope="col">Funções</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$hoje = new DateTime();
			while ($user_data = mysqli_fetch_assoc($result)) {
				if ($user_data['nome_classe'] == "Flexível") {
					echo "<tr>";
					echo "<td>" . $user_data['item_id'] . "</td>";
					echo "<td>" . $user_data['equipamento_nome'] . "</td>";
					echo "<td>" . $user_data['item_num_ca'] . "</td>";
					echo "<td>" . $user_data['item_num_serie'] . "</td>";
					echo "<td>" . $user_data['item_num_laudo'] . "</td>";
					echo "<td>" . $user_data['item_nome_marca'] . "</td>";
					echo "<td>" . $user_data['item_nome_resp'] . "</td>";
					//realiza calculo de vencimento dos itens
					$prazo = new DateTime($user_data['item_data_fab']);
					$prazo->add(new DateInterval('P180D'));
					$diferenca = $prazo->diff($hoje);
					//echo $diferenca->days;
					echo "<td>" . $diferenca->days  . "</td>";
					echo "<td>" . $user_data['item_data_entrega'] . "</td>";
					echo "<td>" . $user_data['nome_colab'] . "</td>";
					echo "<td>" . $user_data['tipo_nome'] . "</td>";
					echo "<td>" . $user_data['nome_classe'] . "</td>";
					echo "<td>" . $user_data['nome'] . "</td>";
					echo "<td>" . $user_data['item_cidade'] . "</td>";
					echo "<td>
							<a href='excluir_item.php?<?=$user_data[item_id];?>'>[EXCLUIR]</a>
							<a href='atualizar_item.php?<?=$user_data[item_id];?>'>[EDITAR]</a>
						</td>";
					echo "</tr>";
					echo "</tr>";
				} else {
					echo "<tr>";
					echo "<td>" . $user_data['item_id'] . "</td>";
					echo "<td>" . $user_data['equipamento_nome'] . "</td>";
					echo "<td>" . $user_data['item_num_ca'] . "</td>";
					echo "<td>" . $user_data['item_num_serie'] . "</td>";
					echo "<td>" . $user_data['item_num_laudo'] . "</td>";
					echo "<td>" . $user_data['item_nome_marca'] . "</td>";
					echo "<td>" . $user_data['item_nome_resp'] . "</td>";
					$prazo = new DateTime($user_data['item_data_fab']);
					$prazo->add(new DateInterval('P360D'));
					$diferenca = $prazo->diff($hoje);
					echo "<td>" . $diferenca->days  . "</td>";
					echo "<td>" . $user_data['item_data_entrega'] . "</td>";
					echo "<td>" . $user_data['nome_colab'] . "</td>";
					echo "<td>" . $user_data['tipo_nome'] . "</td>";
					echo "<td>" . $user_data['nome_classe'] . "</td>";
					echo "<td>" . $user_data['nome'] . "</td>";
					echo "<td>" . $user_data['item_cidade'] . "</td>";
					echo "<td>
							<a href='excluir_item.php?<?=$user_data[item_id];?>'>[EXCLUIR]</a>
							<a href='excluir_item.php?<?=$user_data[item_id];?>'>[EDITAR]</a>
						</td>";
					echo "</tr>";
				}
			}
			?>
			<tfoot>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Equipamento</th>
				<th scope="col">NºCA</th>
				<th scope="col">NºSérie</th>
				<th scope="col">NºLaudo</th>
				<th scope="col">Marca</th>
				<th scope="col">Resp. Teste</th>
				<th scope="col">vencimento</th>
				<th scope="col">Entrega</th>
				<th scope="col">Destino</th>
				<th scope="col">Tipo</th>
				<th scope="col">Classe</th>
				<th scope="col">Usuário</th>
				<th scope="col">Cidade</th>
				<th scope="col">Funções</th>
			</tr>
			</tfoot>
		</tbody>

		<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="../vendor/bootstrap/js/popper.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/select2/select2.min.js"></script>
		<script src="../vendor/tilt/tilt.jquery.min.js"></script>
		<script>
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>

		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

		<script>
			$(document).ready(function() {
				var table = $('#listar-usuario').DataTable({
					rowReorder: {
						selector: 'td:nth-child(2)'
					},
					responsive: true,
					processing: true
				});
			});
		</script>
</body>

</html>