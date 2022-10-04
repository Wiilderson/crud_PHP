<?php

require_once '../database/queries.php';

function findUserAction($conn, $id)
{
	return findUserDb($conn, $id);
}

function readUserAction($conn)
{
	return readUserDb($conn);
}

function createUserAction($conn, $name, $CPF, $telefone, $date, $gender)
{
	$createUserDb = createUserDb($conn, $name, $CPF, $telefone, $date, $gender);
	$message = $createUserDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./listar.php?message=$message");
}

function updateUserAction($conn, $id, $name, $CPF, $fone, $date, $gender)
{
	$updateUserDb = updateUserDb($conn, $id, $name, $CPF, $fone, $date, $gender);
	$message = $updateUserDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./listar.php?message=$message");
}

function deleteUserAction($conn, $id)
{
	$deleteUserDb = deleteUserDb($conn, $id);
	$message = $deleteUserDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./listar.php?message=$message");
}
