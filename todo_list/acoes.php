<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_task'])) {
    $nome = trim($_POST['txtNome']);
    $dataLimite = trim($_POST['txtDataLimite']);
    $status = trim($_POST['txtStatus']);

    $sql = "INSERT INTO todo (nome, data_limite, status) VALUES ('$nome', '$dataNascimento', '$status')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit;
}

if (isset($_POST['edit_task'])) {
    $taskId = mysqli_real_escape_string($conn, $_POST['task_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $dataLimite = mysqli_real_escape_string($conn, $_POST['txtDataLimite']);
    $status = mysqli_real_escape_string($conn, $_POST['txtStatus']);

    $sql = "UPDATE todo SET nome = '{$nome}', data_limite = '{$dataLimite}', status = '{$status}'";

    $sql .= " WHERE id ='{$taskId}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa atualizada!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível atualizar a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}

if (isset($_POST['delete_task'])) {
    $taskId = mysqli_real_escape_string($conn, $_POST['delete_task']);
    $sql = "DELETE FROM todo WHERE id = '$taskId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "A tarefa foi excluída com sucesso.";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa.";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}

if (isset($_POST['update_status'])) {
    $taskId = mysqli_real_escape_string($conn, $_POST['task_id']);
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE todo SET status = '$newStatus' WHERE id = '$taskId'";
}