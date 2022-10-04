<?php

function findUserDb($conn, $id)
{
	$id = mysqli_real_escape_string($conn, $id);
	$user = '';

	$sql = "SELECT * FROM users  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);

	$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $user;
}

function createUserDb($conn, $name, $CPF, $telefone, $date, $gender)
{
	$name = mysqli_real_escape_string($conn, $name);
	$CPF = mysqli_real_escape_string($conn,  $CPF);
	$telefone = mysqli_real_escape_string($conn,  $telefone);
	$date = mysqli_real_escape_string($conn,  $date);
	$gender = mysqli_real_escape_string($conn,  $gender);

	$sql = "INSERT INTO users (nome, CPF, fone, dataNasc, genero) VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error here');

	mysqli_stmt_bind_param($stmt, 'sssss', $name, $CPF, $telefone, $date, $gender);
	mysqli_stmt_execute($stmt);
	mysqli_close($conn);
	return true;
}

function readUserDb($conn)
{
	$users = [];

	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);

	if ($result_check > 0)
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $users;
}

function updateUserDb($conn, $id, $name, $CPF, $fone, $date, $gender)
{
	if ($id && $name && $CPF && $fone && $date && $gender) {
		$sql = "UPDATE users SET nome = ?, CPF = ?, fone = ?, dataNasc = ?, genero = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sssssi', $name, $CPF, $fone, $date, $gender, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteUserDb($conn, $id)
{
	$id = mysqli_real_escape_string($conn, $id);

	if ($id) {
		$sql = "DELETE FROM users WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
		return true;
	}
}
