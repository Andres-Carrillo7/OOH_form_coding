<?php

$error = '';
$success = '';

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isEmailTaken($email, $users) {
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $termsAccepted = isset($_POST['terms']);

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!isValidEmail($email)) {
        $error = "Por favor, introduce un email válido.";
    } elseif ($password !== $confirmPassword) {
        $error = "Las contraseñas no coinciden.";
    } elseif (!$termsAccepted) {
        $error = "Debes aceptar los términos y condiciones.";
    } else {
        $jsonFile = 'users.json';
        $users = [];
        if (file_exists($jsonFile)) {
            $jsonContent = file_get_contents($jsonFile);
            $users = json_decode($jsonContent, true) ?? [];
        }

        if (isEmailTaken($email, $users)) {
            $error = "Ya existe una cuenta con este correo electrónico.";
        } else {
            $userData = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'registered_at' => date('Y-m-d H:i:s')
            ];

            $users[] = $userData;

            if (file_put_contents($jsonFile, json_encode($users, JSON_PRETTY_PRINT))) {
                $success = "¡Registro exitoso!";
            } else {
                $error = "Hubo un problema al registrar el usuario. Por favor, inténtalo de nuevo.";
            }
        }
    }
}
?>