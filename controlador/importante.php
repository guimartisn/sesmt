<table id="tabela-id" class="display table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Equipamento</th>
					<th scope="col">NºCA</th>
					<th scope="col">NºSérie</th>
					<th scope="col">NºLaudo</th>
					<th scope="col">Marca</th>
					<th scope="col">Resp. Teste</th>
					<th scope="col">Dias Restantes</th>
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
				$hoje= new DateTime();
				while ($user_data = mysqli_fetch_assoc($result)) {
					if($user_data['nome_classe']=="Flexível"){
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
						$diferenca=$prazo->diff($hoje);
						//echo $diferenca->days;
						echo "<td>" . $diferenca->days  . "</td>";
						echo "<td>" . $user_data['item_data_entrega'] . "</td>";
						echo "<td>" . $user_data['nome_colab'] . "</td>";
						echo "<td>" . $user_data['tipo_nome'] . "</td>";
						echo "<td>" . $user_data['nome_classe'] . "</td>";
						echo "<td>" . $user_data['nome'] . "</td>";
						echo "<td>" . $user_data['item_cidade'] . "</td>";
						echo "<td>funcoes</td>";
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
						//realiza calculo de vencimento dos itens
						$prazo = new DateTime($user_data['item_data_fab']);
						$prazo->add(new DateInterval('P360D'));
						$diferenca=$prazo->diff($hoje);
						//echo $diferenca->days;
						echo "<td>" . $diferenca->days  . "</td>";
						echo "<td>" . $user_data['item_data_entrega'] . "</td>";
						echo "<td>" . $user_data['nome_colab'] . "</td>";
						echo "<td>" . $user_data['tipo_nome'] . "</td>";
						echo "<td>" . $user_data['nome_classe'] . "</td>";
						echo "<td>" . $user_data['nome'] . "</td>";
						echo "<td>" . $user_data['item_cidade'] . "</td>";
						echo "<td>funcoes</td>";
						echo "</tr>";	
					}
				}
				?>
			</tbody>
		</table>