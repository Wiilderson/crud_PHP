<?php

require_once '../../config.php';
require_once '../../src/functions/functionsDB.php';
require_once '../../src/functions/messages.php';
require_once '../templates/header.php';

$users = readUserAction($conn);

?>
<div class="container">
	<div class="row">
		<h1>Lista de Usuarios</h1>
		<a class="btn btn-success text-white button-width" href="./cadastrar.php">Cadastrar</a>
	</div>
	<div class="row flex-center">
		<?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
	</div>


	<table class="table table-striped table-edit">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">CPF</th>
				<th scope="col">TELEFONE</th>
				<th scope="col">Data Nascimento</th>
				<th scope="col">Genero</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $row) : ?>
				<tr>
					<th scope="row"><?= htmlspecialchars($row['nome']) ?></th>
					<td><?= htmlspecialchars($row['CPF']) ?></td>
					<td><?= htmlspecialchars($row['fone']) ?></td>
					<td><?= htmlspecialchars(date("d/m/Y", strtotime($row['dataNasc']))) ?></td>
					<td><?= htmlspecialchars($row['genero']) ?></td>
					<td>
						<a class="btn btn-primary text-white" href="./editar.php?id=<?= $row['id'] ?>">Edit</a>
						<a class="btn btn-danger text-white" href="./delete.php?id=<?= $row['id'] ?>">Remove</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>