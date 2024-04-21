<?php

// función que genera el array de resultados sin filtrar
function fullCatalog(): false|array
{
  // se incluye configuración
  $config = require 'config.php';

  // se usa PDO para conectar con mysql, con los datos que se traen de la configuración
  $db = new PDO(
    $config['DSN'],
    $config['USERNAME'],
    $config['PASSWORD']
  );

  // se hace la consulta de todos los productos ...
  $result = $db->query(
    "SELECT * FROM `products`"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();



  $db = null;

  return $data;
};

function listCategories(): false|array
{
  // se incluye configuración
  $config = require 'config.php';

  // se usa PDO para conectar con mysql, con los datos que se traen de la configuración
  $db = new PDO(
    $config['DSN'],
    $config['USERNAME'],
    $config['PASSWORD']
  );

  // se hace la consulta de todos los productos ...
  $result = $db->query(
    "SELECT * FROM `categories`"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();



  $db = null;

  return $data;
};

$homeCatalog = fullCatalog();
$homeCategories = listCategories();
$productListItem = include '../src/php/commons/list-product-item.php';
?>

<main class="album py-5 bg-body-tertiary">
  <div class="container">
    <ul class="mb-5 row row-cols-1 row-cols-sm-3 row-cols-md-4 g-4">
      <?php
      // se genera el listado de enlaces a categorías
      foreach ($homeCategories as $item) {
        echo'<li><a href="/categoria/'. $item->id .'">' . $item->name . '</a></li>';
      }
      ?>
    </ul>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      // se generan las secciones de producto con el array de resultados
      foreach ($homeCatalog as $item) {
        echo $productListItem($item, '/producto/');
      }
      ?>
    </div>
  </div>
</main>
