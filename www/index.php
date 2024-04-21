<?php
session_start();

$isLogged = isset($_SESSION['login']) and $_SESSION['login'] === true;

// Variable para saber en que página estamos
$type = $_GET['type'] ?? 'home';

// Array-objeto con los datos de menú
$menu = Array(
  (object)Array(
    'text' => 'Inicio', // texto que se muestra en elemento de menú
    'link' => '/', // ruta del enlace
    'active' => $type === 'home' // $type que provoca que el elemento este seleccionado
  ),
  (object)Array(
    'text' => 'Preguntas frecuentes',
    'link' => '/preguntas-frecuentes',
    'active' => $type === 'faqs'
  ),
  (object)Array(
    'text' => 'Acerca de',
    'link' => '/acerca-de',
    'active' => $type === 'about'
  ),
  ($isLogged
    ? (object)Array(
      'text' => 'Salir',
      'link' => '/salir',
      'active' => false
    )
    : (object)Array(
      'text' => 'Acceso / Registro',
      'link' => '/acceso',
      'active' => $type === 'login-signup'
    )
  )
);

if ($type === 'signup') {
  $signup = include "../src/php/signup.php";
  $signup();
} else if ($type === 'login') {
  $login = include "../src/php/login.php";
  $login();
} else if ($type === 'logout') {
  $logout = include "../src/php/logout.php";
  $logout();
} else {

?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='shortcut icon' type='image/x-icon' href='assets/favicon.ico'>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  >
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="/assets/style.css">

  <title>Basic Store</title>
</head>

<body>

<header class="py-3 mb-4 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-center">
      <h1 class="mb-3 mb-md-0 me-md-auto">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
          <img class="logo" src="/assets/images/logo.svg" alt="">
          <span class="ms-2 fs-4">Basic Store</span>
        </a>
      </h1>

      <ul class="nav nav-pills">
        <?php
        // se genera el menú a partir del array de arriba
        foreach ($menu as $item) {
          echo '
            <li class="nav-item">
              <a
                href="' . $item->link . '"
                class="nav-link ' . ($item->active ? 'active' : '') . '"
                ' . ($item->active ? 'aria-current="page"' : '') . '
              >' . $item->text . '</a>
            </li>
          ';
        }
        ?>
      </ul>
      <form class="form-inline my-2 my-lg-0 d-flex ms-5" action="/buscar" method="post">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="query">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</header>

<?php
// se incluye el php correspondiente a la página activa
include '../src/php/'. $type .'.php';

?>

</body>
</html>

<?php } ?>

