<?php

require_once '../../config.php';
require_once '../functions/functionsDB.php';
require_once '../templates/header.php';

if (isset($_POST["name"]) && isset($_POST["CPF"]) && isset($_POST["telefone"]) && isset($_POST["date"]) && isset($_POST["gender"]))
    createUserAction($conn, $_POST["name"], $_POST["CPF"], $_POST["telefone"], $_POST["date"], $_POST["gender"]);

?>
<div class="container">
    <div class="row">
        <h1>Cadastro Usuario</h1>

        <a class="btn btn-success text-white button-width" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="cadastrar.php" method="POST">
                <label>Nome</label>
                <input type="text" name="name" required />
                <label>CPF</label>
                <input type="number" name="CPF" required />
                <label>Telefone</label>
                <input type="text" name="telefone" required />
                <label>Data Nascimento</label>
                <input type="date" name="date" required />
                <label>Genero</label>
                <input type="text" name="gender" required />

                <button class="btn btn-success text-white" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</div>