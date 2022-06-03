<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>Inicio</title>
  <link rel="icon" href="../img/screws.png" type="image/x-icon">

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
</head>

<body class="text-center">
  
  <form class="form-signin" method="POST" action="{{ route('login') }}">
  @csrf
	<img class="mb-4" src="../img/hammer.png" alt="" width="128" height="128">
    <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
    <label for="inputEmail" class="sr-only">Correo</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required autofocus>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019 - El Martillo</p>
  </form>

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>