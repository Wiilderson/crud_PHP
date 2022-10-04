<?php

require_once '../../config.php';
require_once '../functions/functionsDB.php';
require_once '../templates/header.php';

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["CPF"]) && isset($_POST["fone"]) && isset($_POST["date"]) && isset($_POST["gender"]))
    updateUserAction($conn, $_POST["id"], $_POST["name"], $_POST["CPF"], $_POST["fone"], $_POST["date"], $_POST["gender"]);

$user = findUserAction($conn, $_GET['id']);

?>
<div class="container">
    <div class="row">

        <h1>Editar Usuario</h1>
        <a class="btn btn-success text-white button-width" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="./editar.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id'] ?>" required />
                <label>Nome</label>
                <input type="text" name="name" value="<?= htmlspecialchars($user['nome']) ?>" required />
                <label>E-mail</label>
                <input type="text" name="CPF" value="<?= htmlspecialchars($user['CPF']) ?>" required />
                <label>Telefone</label>
                <input type="text" name="fone" value="<?= htmlspecialchars($user['fone']) ?>" required />
                <label>Nata nascimento</label>
                <input type="date" name="date" value="<?= htmlspecialchars($user['dataNasc']) ?>" required />
                <label>genero</label>
                <input type="text" name="gender" value="<?= htmlspecialchars($user['genero']) ?>" required />
                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>