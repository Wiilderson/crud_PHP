<?php
require_once '../../config.php';
require_once '../functions/functionsDB.php';
require_once '../templates/header.php';

if (isset($_POST['id']))
    deleteUserAction($conn, $_POST['id']);

?>
<div class="container">
    <div class="row">
        <h1>Deletar usuario</h1>
        <a class="btn btn-success text-white button-width" href="../../../index.php">voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="delete.php" method="POST">
                <label>Deseja realmente excluir?</label>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" required />
                <button class="btn btn-success text-white" type="submit">Yes</button>
            </form>
        </div>
    </div>
</div>