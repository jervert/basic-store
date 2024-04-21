<?php

// función que genera el array de resultados de búsqueda
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

  // se hace la consulta ...
  $result = $db->query(
    "SELECT * FROM `products` WHERE name LIKE '%" . $_POST['query'] . "%'"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();
  $db = null;

  return $data;
};

$homeCatalog = fullCatalog();
?>

<main class="album py-5 bg-body-tertiary">
  <div class="container">
    <h2>Resultados de búsqueda: <?php echo $_POST['query'] ?></h2>
    <p class="mb-3"><?php echo count($homeCatalog); ?> resultados</p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
      // se cuentan los resultados con count para ver si son mayor que 0
      if (count($homeCatalog) > 0) {
        // si hay resultados se generan las secciones de producto con el array de resultados
        foreach ($homeCatalog as $item) {
          echo '
          <article class="col">
            <div class="card shadow-sm">
              <img src="/content/images/' . $item->image . '" class="card-img-top" alt="" aria-hidden="true">
              <div class="card-body">
                <h2 class="h4"><a href="/producto/' . $item->id . '">' . $item->name . '</a></h2>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Añadir</button>
                  </div>
                  <small class="text-body-secondary">' . $item->price . ' EUR</small>
                </div>
              </div>
            </div>
          </article>
        ';
        }
      } else {
        // si el número de resultados es 0
        echo '<p>No hay resultados</p>';
      }



      ?>
    </div>
  </div>
</main>
