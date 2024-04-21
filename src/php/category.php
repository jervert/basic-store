<?php

// función que genera el array de resultados sin filtrar
function categoryCatalog(): false|array
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
    "SELECT * FROM `products` WHERE category='" . $_GET['id'] . "'"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();



  $db = null;

  return $data;
};

// datos de categoría
function categoryData(): false|array
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
    "SELECT * FROM `categories` WHERE id='" . $_GET['id'] . "'"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();



  $db = null;

  return $data;
};

$categoryCatalog = categoryCatalog();
$categoryData = categoryData()[0];
$productListItem = include '../src/php/commons/list-product-item.php';
?>

<main class="album py-5 bg-body-tertiary">
  <div class="container">
    <h2><?php echo $categoryData->name; ?></h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      // se generan las secciones de producto con el array de resultados
      foreach ($categoryCatalog as $item) {
        echo $productListItem($item, '/producto/', 3);
      }
      ?>
    </div>
  </div>
</main>
