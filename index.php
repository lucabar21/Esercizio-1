<?php
// echo '<pre>' . print_r($_POST, true) . '</pre>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $errors = [];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }

    if (strlen($age) > 18) {
        $errors['age'] = 'Non sei maggiorenne';
    }

    if (strlen($password) < 12 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)){
        $errors['password'] = 'La password deve contenere almeno 12 caratteri e avere almeno una maiuscola e un numero';
    }

    if ($errors == []) {
        header('Location: /U4-W1-D2/Esercizio 1/success.php');
    }
    echo '<pre>' . print_r($errors) . '</pre>';
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Esercizio 1</title>
    <style>
        body{
            background-color: #3C3C3C;
            color: white;
            font-weight: 700;
            font-family: "roboto", sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
       <div class="col-6 mt-5">
            <form action="" method="post" novalidate>
              <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="nameHelp" placeholder="Mario" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputSurname" class="form-label">Cognome</label>
                <input type="text" class="form-control" name="surname" id="exampleInputSurname" aria-describedby="surnameHelp" placeholder="Rossi" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputAge" class="form-label">Età</label>
                <input type="number" class="form-control" name="age" id="exampleInputAge" aria-describedby="ageHelp" placeholder="18" required>
                <div style="color:red; font-weight:400" class="error"><?= $errors['age'] ?? '' ?></div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="latuamail@email.com" required>
                <div style="color:red; font-weight:400" class="error"><?= $errors['email'] ?? '' ?></div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Lamiapassword2024" required>
                <div style="color:red; font-weight:400" class="error"><?= $errors['password'] ?? '' ?></div>
              </div>
              <div class="d-flex justify-content-center"><button class="btn btn-primary">Invia</button></div>
            </form>
       </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>