<?php
function productDetail(): false|array
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
    "SELECT * FROM `products` WHERE id='" . $_GET['id'] . "'"
  );

  // variable con el array de resultados
  $data = $result->fetchAll(PDO::FETCH_CLASS);

  // ... se cierra la consulta
  $result->closeCursor();
  $db = null;

  return $data;
};

// se coge el primer resultado
$detail = productDetail()[0];
?>

<main class="bg-body-tertiary">
  <div class="container">
    <?php
      // se generan el detalle de producto con el resultado
      echo '
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-6">
              <img
                src="/content/images/' . $detail->image . '"
                class="img-fluid"
                alt=""
                aria-hidden="true"
              />
            </div>
            <div class="col-lg-6">
              <h2 class="fw-bold">' . $detail->name . '</h2>
              <p class="text-muted">Product Category</p>
              <h3 class="my-4">' . $detail->price . ' EUR</h3>
              <p class="mb-4">
                ' . $detail->description . '
              </p>

              <div class="d-flex gap-3 mb-4">
                <button class="btn btn-primary" type="button">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      ';
    ?>
  </div>
</main>
